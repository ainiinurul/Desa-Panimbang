<?php

namespace App\Http\Controllers\Admin; // <-- Perhatikan, namespace sekarang adalah Admin

use App\Http\Controllers\Controller; // <-- Penting untuk di-use
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Menampilkan halaman manajemen pengaduan di admin.
     * Method ini untuk diakses oleh Admin.
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    /**
     * Menyimpan pengaduan baru dari form publik.
     * Method ini untuk diakses oleh Warga/Publik.
     * Tidak masalah method ini ada di controller Admin demi kepraktisan.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
            'keperluan' => 'required|string',
            'isi_pesan' => 'required|string',
        ]);

        // Simpan ke database
        Pengaduan::create($request->all());

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaduan Anda berhasil terkirim. Terima kasih!');
    }

    /**
     * ▼▼▼ TAMBAHKAN METHOD BARU DI BAWAH INI ▼▼▼
     *
     * Menghapus data pengaduan.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    /**
     * Menampilkan detail pengaduan dalam format JSON untuk modal.
     */
    public function show(Pengaduan $pengaduan)
    {
        // Mengembalikan data sebagai JSON
        return response()->json($pengaduan);
    }

    /**
     * Update status pengaduan.
     */
    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        // Validasi input yang masuk dari form
        $request->validate([
            'status' => 'required|in:Masuk,Diproses,Selesai',
        ]);

        // Lakukan update pada data pengaduan yang dipilih
        $pengaduan->update([
            'status' => $request->status,
        ]);

        // Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('admin.pengaduan.index')->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}