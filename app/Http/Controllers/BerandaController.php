<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Program; // TAMBAHKAN INI: untuk memanggil model Program
use App\Models\Setting;
use Carbon\Carbon;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan semua data yang dibutuhkan.
     */
    public function index()
    {
        // 1. Mengambil data berita
        $berita = Berita::where(function($query) {
                $query->where('status', 'published')
                        ->orWhere(function($q) {
                            $q->where('status', 'scheduled')
                            ->where('published_at', '<=', Carbon::now());
                        });
            })
            ->latest('published_at')
            ->take(4)
            ->get();

        // 2. Mengambil data program desa
        $programDesa = Program::where(function($query) {
            $query->where('status', 'published')
                ->orWhere(function($q) {
                    $q->where('status', 'scheduled')
                        ->where('published_at', '<=', \Carbon\Carbon::now());
                });
        })
        ->latest('published_at')
        ->take(6) // Ambil 6 program saja
        ->get();

        // 3. Mengambil SEMUA pengaturan website (TERMASUK VISI & MISI)
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // 4. Mengirim SEMUA data ('berita', 'programDesa', dan 'settings') ke view secara bersamaan
        return view('beranda', compact('berita', 'programDesa', 'settings'));
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
        
        return view('pages.berita-detail', compact('berita', 'related'));
    }
}