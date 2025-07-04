<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistiks'; // Menegaskan nama tabel

    protected $fillable = [
        'penduduk_pria', 'penduduk_wanita', 'usia_anak', 'usia_produktif', 'usia_lansia',
        'pendidikan_sd', 'pendidikan_smp', 'pendidikan_sma', 'pendidikan_pt',
        'fasilitas_paud', 'fasilitas_sd', 'fasilitas_smp', 'fasilitas_sma',
        'sarana_puskesmas', 'sarana_posyandu', 'sarana_bidan', 'sarana_apotek',
        'sarana_masjid', 'sarana_mushola', 'sarana_gereja', 'sarana_pura',
        'sarana_jalan_km', 'sarana_jembatan', 'sarana_irigasi_km', 'sarana_bts',
        'apb_pad', 'apb_dana_desa', 'apb_alokasi_dana', 'apb_bantuan',
        'posyandu_jumlah_balita', 'posyandu_jumlah_bumil', 'posyandu_jumlah_posyandu',
        'posyandu_chart_pria', 'posyandu_chart_wanita',
        'idm_skor', 'idm_status', 'idm_target', 'idm_skor_minimal',
        'idm_ikl', 'idm_iks', 'idm_ike',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'posyandu_chart_pria' => 'array',
        'posyandu_chart_wanita' => 'array',
    ];
}
