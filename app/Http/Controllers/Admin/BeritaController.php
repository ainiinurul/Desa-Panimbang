<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan'];
        return view('admin.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|max:255',
                'tanggal' => 'required|date',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:draft,published,scheduled',
                'published_at' => 'nullable|date'
            ]);

            if ($request->status != 'scheduled') {
                $validated['published_at'] = null;
            }

            $validated['slug'] = Str::slug($request->judul);
            $validated['user_id'] = Auth::id();

            if ($request->hasFile('gambar')) {
                $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
            }

            // Simpan dan log hasil
            $berita = Berita::create($validated);
            Log::info('Berita berhasil disimpan dengan ID: ' . $berita->id);

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error saat menyimpan berita: ' . $e->getMessage());
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $kategori = ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan'];
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|max:255',
                'tanggal' => 'required|date',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:draft,published,scheduled',
                'published_at' => 'nullable|date'
            ]);

            // Handle scheduled posts
            if ($request->status != 'scheduled') {
                $validated['published_at'] = null;
            }

            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete old image if exists
                if ($berita->gambar) {
                    Storage::disk('public')->delete($berita->gambar);
                }
                $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
            }

            // Generate slug from title
            $validated['slug'] = Str::slug($request->judul);

            // Log before update
            Log::info('Updating berita ID: ' . $berita->id . ' with data: ' . json_encode($validated));
            
            // Update the berita
            $berita->update($validated);
            
            // Log success
            Log::info('Berita berhasil diupdate dengan ID: ' . $berita->id);

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error saat update berita: ' . $e->getMessage());
            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy(Berita $berita)
    {
        try {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->delete();
            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error saat menghapus berita: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus berita']);
        }
    }
}