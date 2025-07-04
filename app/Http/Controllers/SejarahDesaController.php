<?php

namespace App\Http\Controllers;

use App\Models\Sejarah; // <-- Import model Sejarah
use Illuminate\Http\Request;

class SejarahDesaController extends Controller
{
    /**
     * Menampilkan halaman sejarah untuk pengunjung.
     */
    public function index()
    {
        // Ambil data sejarah dari database
        $sejarah = Sejarah::first();

        // Jika data belum ada (misal: situs baru), buat objek kosong
        // agar halaman tidak error.
        if (!$sejarah) {
            $sejarah = new Sejarah();
        }

        // Tampilkan view 'sejarah.blade.php' dan kirimkan data '$sejarah' ke dalamnya
        return view('sejarah', compact('sejarah'));
    }
}
