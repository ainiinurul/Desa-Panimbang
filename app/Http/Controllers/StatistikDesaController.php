<?php

namespace App\Http\Controllers;

use App\Models\Statistik; // <-- Import model Statistik
use App\Models\Wilayah;   // <-- Import model Wilayah
use Illuminate\Http\Request;

class StatistikDesaController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel statistiks
        $statistik = Statistik::first();
        if (!$statistik) {
            $statistik = new Statistik(); // Buat objek kosong jika tidak ada data
        }

        // Ambil data dari tabel wilayahs
        $wilayah = Wilayah::first();
        if (!$wilayah) {
            $wilayah = new Wilayah(); // Buat objek kosong jika tidak ada data
        }

        // Kirim KEDUA data ke view
        return view('statistik', compact('statistik', 'wilayah'));
    }
}