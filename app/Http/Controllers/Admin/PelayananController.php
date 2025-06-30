<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelayanan; // Jangan lupa impor model Pelayanan

class PelayananController extends Controller
{
    /**
     * Menampilkan halaman utama manajemen pelayanan.
     */
    public function index()
    {
        // Mengambil semua data pelayanan dari database, diurutkan dari yang terbaru
        $pelayanans = Pelayanan::latest()->get();

        // Mengirim data ke view
        return view('admin.pelayanan.index', compact('pelayanans'));
    }

    /**
     * Menyimpan permohonan pelayanan baru dari form publik.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'nomor_telepon' => 'required|string|max:20',
            'jenis_surat' => 'required|string|max:255',
            'lainnya' => 'nullable|string|max:255',
            'keperluan' => 'nullable|string',
        ]);

        $jenis_surat_final = $request->jenis_surat;
        if ($request->jenis_surat === 'Lainnya' && $request->lainnya) {
            $jenis_surat_final = $request->lainnya;
        }

        Pelayanan::create([
            'nama_pemohon' => $request->nama,
            'nik_pemohon' => $request->nik,
            'jenis_surat' => $jenis_surat_final,
            'keperluan' => $request->keperluan ?? 'Tidak ada keterangan khusus',
            'nomor_telepon' => $request->nomor_telepon,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Permohonan Anda berhasil diajukan! Silakan tunggu konfirmasi dari admin.');
    }

    /**
     * Memperbarui status permohonan pelayanan.
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:Diproses,Selesai,Ditolak',
        ]);

        // Cari data pelayanan berdasarkan ID
        $pelayanan = Pelayanan::findOrFail($id);

        // Update statusnya
        $pelayanan->status = $request->status;
        $pelayanan->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status permohonan berhasil diperbarui.');
    }

    /**
     * Menghapus data permohonan dari database.
     */
    public function destroy(Pelayanan $pelayanan)
    {
        $pelayanan->delete();

        return redirect()->route('admin.pelayanan.index')
                         ->with('success', 'Permohonan berhasil dihapus.');
    }

    /**
     * Method untuk menampilkan detail permohonan via AJAX.
     */
    public function show(Pelayanan $pelayanan) // Ganti 'Pelayanan' jika nama Model Anda berbeda
    {
        return response()->json($pelayanan);
    }
}