<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelayanan; // Impor model Pelayanan

class PelayananController extends Controller
{
    /**
     * Menampilkan halaman formulir permohonan online.
     */
    public function create()
    {
        // Cukup tampilkan view-nya saja
        return view('pelayanan'); 
    }

    /**
     * Menyimpan permohonan baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'nama_pemohon'  => 'required|string|max:255',
            'nik_pemohon'   => 'required|numeric|digits:16',
            'nomor_telepon' => 'required|string|max:20',
            'jenis_surat'   => 'required|string',
            'lainnya'       => 'nullable|string|max:255',
            'keperluan'     => 'required|string',
        ]);

        // Menentukan nilai untuk jenis surat
        $jenisSurat = $request->jenis_surat;
        if ($request->jenis_surat === 'Lainnya') {
            $jenisSurat = $request->lainnya;
        }

        // 2. Simpan data ke database
        Pelayanan::create([
            'nama_pemohon'  => $request->nama_pemohon,
            'nik_pemohon'   => $request->nik_pemohon,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_surat'   => $jenisSurat,
            'keperluan'     => $request->keperluan,
        ]);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Permohonan Anda telah berhasil dikirim! Silakan tunggu konfirmasi dari petugas desa.');
    }
}