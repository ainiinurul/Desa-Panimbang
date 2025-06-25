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
        'jenis_surat',
        'keperluan',
        'nomor_telepon',
        'status',
        'catatan_admin',
    ];
}