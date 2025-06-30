<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerangkatDesa;

class LembagaController extends Controller // <-- Nama class-nya sudah sesuai
{
    /**
     * Menampilkan halaman lembaga desa.
     */
    public function lembaga()
    {
        $kepalaDesa = PerangkatDesa::where('jabatan', 'like', '%Kepala Desa%')->first();
        
        $perangkatLainnya = PerangkatDesa::where('jabatan', 'not like', '%Kepala Desa%')
                                         ->orderBy('urutan', 'asc')
                                         ->get();

        return view('lembaga', compact('kepalaDesa', 'perangkatLainnya'));
    }
}