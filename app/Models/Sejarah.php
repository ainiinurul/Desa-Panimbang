<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul_utama',
        'sub_judul',
        'paragraf_1',
        'paragraf_2',
        'silsilah_kepala_desa',
        'sebelum_pemekaran',
        'setelah_pemekaran',
        'sejarah_kantor_desa',
    ];
}