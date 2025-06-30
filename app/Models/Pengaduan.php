<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'no_whatsapp',
        'keperluan',
        'isi_pesan',
        'status',
    ];
}