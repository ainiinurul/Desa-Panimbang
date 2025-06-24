<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Program; // TAMBAHKAN INI: untuk memanggil model Program
use Carbon\Carbon;

class BerandaController extends Controller
{
    /**
     * FUNGSI INDEX YANG SUDAH DIGABUNG DAN DIPERBAIKI
     * Menampilkan halaman beranda dengan data berita dan program desa.
     */
    public function index()
    {
        // 1. Mengambil data berita dengan logika Anda yang sudah benar
        $berita = Berita::where(function($query) {
                $query->where('status', 'published')
                      ->orWhere(function($q) {
                          $q->where('status', 'scheduled')
                            ->where('published_at', '<=', Carbon::now());
                      });
            })
            ->latest('published_at') // Urutkan berdasarkan tanggal publikasi terbaru
            ->take(4) // Ambil 4 berita terbaru untuk halaman depan
            ->get();

        // 2. Mengambil data program desa dari database
        $programDesa = Program::latest()->get();

        // 3. Mengirim kedua variabel ('berita' dan 'programDesa') ke view
        return view('beranda', compact('berita', 'programDesa'));
    }
    
    /**
     * Menampilkan semua berita dengan paginasi dan filter kategori.
     */
    public function allBerita(Request $request)
    {
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
    
    /**
     * Menampilkan detail satu berita.
     */
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

    // FUNGSI INDEX KEDUA YANG DUPLIKAT SUDAH DIHAPUS DARI SINI
}