<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_wilayah',
        'daratan',
        'sawah',
        'tanah_kas_desa',
        'telaga',
        'lain_lain',
        'geografis_deskripsi',
        'iklim_deskripsi',
    ];
}