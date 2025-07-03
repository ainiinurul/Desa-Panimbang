<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    // TAMBAHKAN NAMA KOLOM BARU DI SINI
    protected $fillable = [
        'nama',
        'jabatan',
        'nip', // <- Baru
        'tempat_lahir', // <- Baru
        'tanggal_lahir', // <- Baru
        'jenis_kelamin', // <- Baru
        'agama', // <- Baru
        'pendidikan',
        'alamat',
        'telepon',
        'deskripsi',
        'foto',
        'urutan', // asumsikan urutan juga ada
    ];
}