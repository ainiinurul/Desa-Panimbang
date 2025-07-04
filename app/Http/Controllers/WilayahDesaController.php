<?php

namespace App\Http\Controllers;

use App\Models\Wilayah; // <-- Import model Wilayah
use Illuminate\Http\Request;

class WilayahDesaController extends Controller
{
    public function index()
    {
        // Ambil data wilayah dari database
        $wilayah = Wilayah::first();

        // Jika data belum ada, buat objek kosong agar tidak error
        if (!$wilayah) {
            $wilayah = new Wilayah();
        }

        // Tampilkan view 'wilayah.blade.php' dan kirimkan data '$wilayah'
        return view('wilayah', compact('wilayah'));
    }
}