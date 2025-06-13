<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total berita berdasarkan status
        $totalBerita = Berita::count();
        $publishedBerita = Berita::where('status', 'published')->count();
        $scheduledBerita = Berita::where('status', 'scheduled')->count();
        $draftBerita = Berita::where('status', 'draft')->count();
        
        // Data untuk chart/statistik jika diperlukan
        $beritaByKategori = Berita::selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->get();
            
        return view('admin.dashboard', compact(
            'totalBerita', 
            'publishedBerita', 
            'scheduledBerita', 
            'draftBerita',
            'beritaByKategori'
        ));
    }
}