<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Program;
use App\Models\Statistik;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Data Berita
        $totalBerita = Berita::count();
        $publishedBerita = Berita::where('status', 'published')->count();
        $scheduledBerita = Berita::where('status', 'scheduled')->count();
        $draftBerita = Berita::where('status', 'draft')->count();

        $beritaByKategori = Berita::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        $latestBerita = Berita::latest()->take(5)->get();
        $latestPrograms = Program::latest()->take(5)->get();

        // Ambil data dari tabel Statistik & Wilayah
        $statistik = Statistik::first();
        $wilayah = Wilayah::first();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'totalBerita' => $totalBerita,
            'publishedBerita' => $publishedBerita,
            'scheduledBerita' => $scheduledBerita,
            'draftBerita' => $draftBerita,
            'beritaByKategori' => $beritaByKategori,
            'latestBerita' => $latestBerita,
            'latestPrograms' => $latestPrograms, 
            'statistik' => $statistik,
            'wilayah' => $wilayah,
        ];

        return view('admin.dashboard', $data);
    }
}