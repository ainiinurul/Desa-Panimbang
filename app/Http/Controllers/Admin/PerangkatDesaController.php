<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDesa::orderBy('urutan')->get();
        return view('admin.lembaga.index', compact('perangkat'));
    }

    public function create()
    {
        return view('admin.lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pendidikan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        $path = $request->file('foto')->store('perangkat-desa', 'public');

        PerangkatDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path,
            'pendidikan' => $request->pendidikan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.lembaga.index')->with('success', 'Data perangkat desa berhasil ditambahkan.');
    }

    public function edit(PerangkatDesa $lembaga) 
    {
        return view('admin.lembaga.edit', ['perangkat' => $lembaga]);
    }

    /**
     * UBAH BAGIAN INI
     * Mengubah nama parameter dari $perangkat menjadi $lembaga
     */
    public function update(Request $request, PerangkatDesa $lembaga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pendidikan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only('nama', 'jabatan', 'pendidikan', 'alamat', 'telepon', 'deskripsi');

        if ($request->hasFile('foto')) {
            if ($lembaga->foto) { // Menggunakan $lembaga
                Storage::disk('public')->delete($lembaga->foto);
            }
            $data['foto'] = $request->file('foto')->store('perangkat-desa', 'public');
        }

        $lembaga->update($data); // Menggunakan $lembaga

        return redirect()->route('admin.lembaga.index')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }
    
    /**
     * UBAH BAGIAN INI
     * Mengubah nama parameter dari $perangkat menjadi $lembaga
     */
    public function destroy(PerangkatDesa $lembaga)
    {
        if ($lembaga->foto) { // Menggunakan $lembaga
            Storage::disk('public')->delete($lembaga->foto);
        }

        $lembaga->delete(); // Menggunakan $lembaga

        return redirect()->route('admin.lembaga.index')->with('success', 'Data perangkat desa berhasil dihapus.');
    }

    /**
     * TAMBAHAN: Method untuk mendapatkan detail perangkat desa (AJAX)
     */
    public function detail(PerangkatDesa $lembaga)
    {
        return response()->json([
            'id' => $lembaga->id,
            'nama' => $lembaga->nama,
            'jabatan' => $lembaga->jabatan,
            'foto' => $lembaga->foto,
            'pendidikan' => $lembaga->pendidikan ?? null,
            'alamat' => $lembaga->alamat ?? null,
            'telepon' => $lembaga->telepon ?? null,
            'deskripsi' => $lembaga->deskripsi ?? null,
        ]);
    }
}