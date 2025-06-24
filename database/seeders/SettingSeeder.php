<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create(['key' => 'nama_kepala_desa', 'value' => 'S.COUPS', 'type' => 'text']);
        Setting::create(['key' => 'foto_kepala_desa', 'value' => 'img/scoups.jpg', 'type' => 'image']);
        Setting::create(['key' => 'sambutan_kepala_desa', 'value' => 'Kami senang Anda sudah berkunjung...', 'type' => 'textarea']);
        Setting::create(['key' => 'visi_desa', 'value' => 'Menjadi pelopor transparansi...', 'type' => 'textarea']);
        Setting::create(['key' => 'misi_desa', 'value' => '1. Meningkatkan Aksesibilitas...', 'type' => 'textarea']);

        // --- TAMBAHKAN BARIS INI ---
        Setting::create(['key' => 'header_background_image', 'value' => 'img/desa.jpg', 'type' => 'image']);
    }
}