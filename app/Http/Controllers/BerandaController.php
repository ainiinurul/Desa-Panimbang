<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil berita yang statusnya published atau yang scheduled dan waktunya sudah lewat
        $berita = Berita::where(function($query) {
                $query->where('status', 'published')
                      ->orWhere(function($q) {
                          $q->where('status', 'scheduled')
                            ->where('published_at', '<=', Carbon::now());
                      });
            })
            ->latest('published_at') // Urutkan berdasarkan tanggal publikasi terbaru
            ->take(4) // Ambil 6 berita terbaru
            ->get();
        
        return view('beranda', compact('berita'));
    }
    
    public function allBerita(Request $request)
    {
        // Filter berita berdasarkan kategori jika ada
        $query = Berita::where(function($query) {
            $query->where('status', 'published')
                  ->orWhere(function($q) {
                      $q->where('status', 'scheduled')
                        ->where('published_at', '<=', Carbon::now());
                  });
        });
        
        if ($request->has('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        
        $berita = $query->latest('published_at')
                        ->paginate(12);
        
        $kategori = ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan'];
        
        return view('berita.index', compact('berita', 'kategori'));
    }
    
    public function showBerita(Berita $berita)
    {
        
        // Pastikan hanya berita yang published atau scheduled yang bisa diakses
        if ($berita->status == 'draft' || 
            ($berita->status == 'scheduled' && $berita->published_at > Carbon::now())) {
            abort(404);
        }
        
        // Berita terkait dengan kategori yang sama
        $related = Berita::where('id', '!=', $berita->id)
                        ->where('kategori', $berita->kategori)
                        ->where(function($query) {
                            $query->where('status', 'published')
                                ->orWhere(function($q) {
                                    $q->where('status', 'scheduled')
                                        ->where('published_at', '<=', Carbon::now());
                                });
                        })
                        ->latest('published_at')
                        ->take(3)
                        ->get();
        
        return view('berita.show', compact('berita', 'related'));
    }
}