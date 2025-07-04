<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sejarah; // <-- Jangan lupa import model Sejarah
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Menampilkan halaman manajemen sejarah.
     */
    public function index()
    {
        // Ambil data sejarah. Jika belum ada, buat baris baru yang kosong.
        // Ini untuk mencegah error saat pertama kali halaman diakses.
        $sejarah = Sejarah::firstOrCreate(
            ['id' => 1], // Selalu cari atau buat dengan id = 1
            [
                'paragraf_1' => '',
                'paragraf_2' => '',
                'silsilah_kepala_desa' => '',
                'sebelum_pemekaran' => '',
                'setelah_pemekaran' => '',
                'sejarah_kantor_desa' => '',
            ]
        );

        // Tampilkan view dan kirim data sejarah ke dalamnya
        return view('admin.sejarah.index', compact('sejarah'));
    }

    /**
     * Memperbarui data sejarah di database.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'judul_utama' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'paragraf_1' => 'required|string',
            'paragraf_2' => 'required|string',
            'silsilah_kepala_desa' => 'required|string',
            'sebelum_pemekaran' => 'required|string',
            'setelah_pemekaran' => 'required|string',
            'sejarah_kantor_desa' => 'required|string',
        ]);

        // Cari data sejarah (seharusnya hanya ada satu) dan update
        $sejarah = Sejarah::find(1);
        $sejarah->update($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data sejarah berhasil diperbarui!');
    }
}