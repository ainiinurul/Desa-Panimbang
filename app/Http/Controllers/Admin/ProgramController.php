<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $kategori = ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan', 'Pemerintahan'];
        return view('admin.programs.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:255',
            'deskripsi' => 'required',
            'periode' => 'required|max:255',
            'link' => 'nullable|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $validatedData['slug'] = Str::slug($request->judul, '-');

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('program-images', 'public');
        }

        Program::create($validatedData);

        return redirect('/admin/programs')->with('success', 'Program baru berhasil ditambahkan!');
    }

    public function show(Program $program)
    {
        return view('admin.programs.show', [
            'title' => 'Detail Program',
            'program' => $program,
        ]);
    }

    public function edit(Program $program)
    {
        $kategori = ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan', 'Pemerintahan'];
        return view('admin.programs.edit', compact('program', 'kategori'));
    }

    public function update(Request $request, Program $program)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:255',
            'deskripsi' => 'required',
            'periode' => 'required|max:255',
            'link' => 'nullable|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $validatedData['slug'] = Str::slug($request->judul, '-');

        if ($request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($program->gambar) {
                Storage::disk('public')->delete($program->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('program-images', 'public');
        }

        $program->update($validatedData);

        return redirect('/admin/programs')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy(Program $program)
    {
        // Hapus gambar dari storage
        if ($program->gambar) {
            Storage::disk('public')->delete($program->gambar);
        }

        $program->delete();
        return redirect('/admin/programs')->with('success', 'Program berhasil dihapus!');
    }
}