<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik; // <-- Import model Statistik
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    /**
     * Menampilkan halaman manajemen data statistik.
     */
    public function index()
    {
        // Ambil data statistik. Jika belum ada, buat baris baru dengan nilai default.
        $statistik = Statistik::firstOrCreate(
            ['id' => 1],
            [
                // Default values, bisa disesuaikan
                'posyandu_chart_pria' => [0, 0, 0, 0], // Default untuk 4 kelompok umur
                'posyandu_chart_wanita' => [0, 0, 0, 0],
            ]
        );

        // Tampilkan view dan kirim data statistik ke dalamnya
        return view('admin.statistik.index', compact('statistik'));
    }

    /**
     * Memperbarui data statistik di database.
     */
    public function update(Request $request)
    {
        // Validasi semua data yang masuk dari form
        $request->validate([
            'penduduk_pria' => 'required|integer|min:0',
            'penduduk_wanita' => 'required|integer|min:0',
            'usia_anak' => 'required|integer|min:0',
            'usia_produktif' => 'required|integer|min:0',
            'usia_lansia' => 'required|integer|min:0',
            'pendidikan_sd' => 'required|integer|min:0',
            'pendidikan_smp' => 'required|integer|min:0',
            'pendidikan_sma' => 'required|integer|min:0',
            'pendidikan_pt' => 'required|integer|min:0',
            'fasilitas_paud' => 'required|integer|min:0',
            'fasilitas_sd' => 'required|integer|min:0',
            'fasilitas_smp' => 'required|integer|min:0',
            'fasilitas_sma' => 'required|integer|min:0',
            'sarana_puskesmas' => 'required|integer|min:0',
            'sarana_posyandu' => 'required|integer|min:0',
            'sarana_bidan' => 'required|integer|min:0',
            'sarana_apotek' => 'required|integer|min:0',
            'sarana_masjid' => 'required|integer|min:0',
            'sarana_mushola' => 'required|integer|min:0',
            'sarana_gereja' => 'required|integer|min:0',
            'sarana_pura' => 'required|integer|min:0',
            'sarana_jalan_km' => 'required|numeric|min:0',
            'sarana_jembatan' => 'required|integer|min:0',
            'sarana_irigasi_km' => 'required|numeric|min:0',
            'sarana_bts' => 'required|integer|min:0',
            'apb_pad' => 'required|numeric|min:0',
            'apb_dana_desa' => 'required|numeric|min:0',
            'apb_alokasi_dana' => 'required|numeric|min:0',
            'apb_bantuan' => 'required|numeric|min:0',
            'posyandu_jumlah_balita' => 'required|integer|min:0',
            'posyandu_jumlah_bumil' => 'required|integer|min:0',
            'posyandu_jumlah_posyandu' => 'required|integer|min:0',
            'posyandu_chart_pria' => 'required|array|size:4',
            'posyandu_chart_pria.*' => 'required|integer|min:0',
            'posyandu_chart_wanita' => 'required|array|size:4',
            'posyandu_chart_wanita.*' => 'required|integer|min:0',
            'idm_skor' => 'required|numeric|min:0',
            'idm_status' => 'required|string|max:255',
            'idm_target' => 'required|string|max:255',
            'idm_skor_minimal' => 'required|numeric|min:0',
            'idm_ikl' => 'required|numeric|min:0',
            'idm_iks' => 'required|numeric|min:0',
            'idm_ike' => 'required|numeric|min:0',
            'idm_tahun' => 'required|digits:4|integer|min:1900',
        ]);

        // Cari data statistik (yang seharusnya hanya ada satu) dan update
        $statistik = Statistik::find(1);
        $statistik->update($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data statistik berhasil diperbarui!');
    }
}