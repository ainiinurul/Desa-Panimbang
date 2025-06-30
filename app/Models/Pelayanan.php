<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        protected $fillable = [
        'nama_pemohon',
        'nik_pemohon',
        'jenis_surat',     // Kita akan gunakan ini sebagai acuan
        'nomor_telepon',   // Kita akan gunakan ini sebagai acuan
        'keterangan',      // <-- SAYA TAMBAHKAN INI
        'lainnya',         // <-- SAYA TAMBAHKAN INI (untuk opsi permohonan lainnya)
        'status',
        'catatan_admin',
    ];
}