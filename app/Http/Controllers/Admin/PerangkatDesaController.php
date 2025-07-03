<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    // ... (method index dan create tidak berubah)
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
        // Menambahkan validasi untuk field baru
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'nip' => 'nullable|string|max:50',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|max:20',
            'agama' => 'nullable|string|max:20',
            'pendidikan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        $path = $request->file('foto')->store('perangkat-desa', 'public');

        // Menambahkan field baru saat membuat data
        PerangkatDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $path,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
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

    public function update(Request $request, PerangkatDesa $lembaga)
    {
        // Menambahkan validasi untuk field baru
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'nip' => 'nullable|string|max:50',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|max:20',
            'agama' => 'nullable|string|max:20',
            'pendidikan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);
        
        // Menambahkan field baru ke data yang akan diupdate
        $data = $request->only('nama', 'jabatan', 'nip', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan', 'alamat', 'telepon', 'deskripsi');

        if ($request->hasFile('foto')) {
            if ($lembaga->foto) {
                Storage::disk('public')->delete($lembaga->foto);
            }
            $data['foto'] = $request->file('foto')->store('perangkat-desa', 'public');
        }

        $lembaga->update($data);

        return redirect()->route('admin.lembaga.index')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }
    
    public function destroy(PerangkatDesa $lembaga)
    {
        if ($lembaga->foto) {
            Storage::disk('public')->delete($lembaga->foto);
        }
        $lembaga->delete();
        return redirect()->route('admin.lembaga.index')->with('success', 'Data perangkat desa berhasil dihapus.');
    }

    /**
     * INI YANG PALING PENTING UNTUK MODAL DETAIL
     * Kita tambahkan semua field baru ke dalam JSON response
     */
    public function detail(PerangkatDesa $lembaga)
    {
        return response()->json([
            'id' => $lembaga->id,
            'nama' => $lembaga->nama,
            'jabatan' => $lembaga->jabatan,
            'foto' => $lembaga->foto,
            'nip' => $lembaga->nip ?? null,
            'tempat_lahir' => $lembaga->tempat_lahir ?? null,
            'tanggal_lahir' => $lembaga->tanggal_lahir ?? null,
            'jenis_kelamin' => $lembaga->jenis_kelamin ?? null,
            'agama' => $lembaga->agama ?? null,
            'pendidikan' => $lembaga->pendidikan ?? null,
            'alamat' => $lembaga->alamat ?? null,
            'telepon' => $lembaga->telepon ?? null,
            'deskripsi' => $lembaga->deskripsi ?? null,
        ]);
    }
}