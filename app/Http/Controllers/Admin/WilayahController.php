<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wilayah; // <-- Jangan lupa import model Wilayah
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Menampilkan halaman manajemen data wilayah.
     */
    public function index()
    {
        // Ambil data wilayah. Jika belum ada, buat baris baru dengan nilai default.
        $wilayah = Wilayah::firstOrCreate(
            ['id' => 1],
            [
                'total_wilayah' => 0,
                'daratan' => 0,
                'sawah' => 0,
                'tanah_kas_desa' => 0,
                'telaga' => 0,
                'lain_lain' => 0,
                'geografis_deskripsi' => '',
                'iklim_deskripsi' => '',
            ]
        );

        // Tampilkan view dan kirim data wilayah ke dalamnya
        return view('admin.wilayah.index', compact('wilayah'));
    }

    /**
     * Memperbarui data wilayah di database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'total_wilayah' => 'required|numeric|min:0',
            'daratan' => 'required|numeric|min:0',
            'sawah' => 'required|numeric|min:0',
            'tanah_kas_desa' => 'required|numeric|min:0',
            'telaga' => 'required|numeric|min:0',
            'lain_lain' => 'required|numeric|min:0',
            'geografis_deskripsi' => 'required|string',
            'iklim_deskripsi' => 'required|string',
        ]);

        // Cari data wilayah (yang seharusnya hanya ada satu) dan update
        $wilayah = Wilayah::find(1);
        $wilayah->update($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data wilayah berhasil diperbarui!');
    }
}