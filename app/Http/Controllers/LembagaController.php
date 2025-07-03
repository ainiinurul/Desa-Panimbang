<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        // Ambil Kepala Desa (berdasarkan jabatan atau urutan pertama)
        $kepalaDesa = PerangkatDesa::where('jabatan', 'LIKE', '%Kepala Desa%')
                                     ->orWhere('urutan', 1)
                                     ->first();

        // Ambil semua perangkat desa lainnya, diurutkan berdasarkan 'urutan'
        // Jika Kepala Desa ditemukan, kita tidak menampilkannya lagi di daftar bawah
        $perangkatLainnya = PerangkatDesa::where('id', '!=', $kepalaDesa ? $kepalaDesa->id : 0)
                                            ->orderBy('urutan', 'asc')
                                            ->get();

        return view('lembaga', [
            'kepalaDesa' => $kepalaDesa,
            'perangkatLainnya' => $perangkatLainnya
        ]);
    }
}