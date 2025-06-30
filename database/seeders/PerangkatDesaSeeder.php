<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerangkatDesa; // Impor model PerangkatDesa

class PerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikat saat seeding ulang
        PerangkatDesa::query()->delete();

        $perangkat = [
            // Data dari file lembaga.blade.php
            ['nama' => 'S.SCOUPS', 'jabatan' => 'Kepala Desa Panimbang', 'foto' => 'perangkat-desa-img/scoups.jpg', 'urutan' => 1],
            ['nama' => 'PHARITA', 'jabatan' => 'Sekretaris Desa', 'foto' => 'perangkat-desa-img/pharita.jpg', 'urutan' => 2],
            ['nama' => 'JAEHYUN', 'jabatan' => 'Kasi Pemerintahan', 'foto' => 'perangkat-desa-img/jaehyun.jpg', 'urutan' => 3],
            ['nama' => 'TAEHYUNG', 'jabatan' => 'Kasi Kesejahteraan', 'foto' => 'perangkat-desa-img/taehyung.jpg', 'urutan' => 4],
            ['nama' => 'MINGYU', 'jabatan' => 'Kaur Pelayanan', 'foto' => 'perangkat-desa-img/mingyu.jpg', 'urutan' => 5],
            ['nama' => 'JISOO', 'jabatan' => 'Kaur Umum dan Perencanaan', 'foto' => 'perangkat-desa-img/jisoo.jpg', 'urutan' => 6],
            ['nama' => 'JENNIE', 'jabatan' => 'Kaur Keuangan', 'foto' => 'perangkat-desa-img/jennie.jpg', 'urutan' => 7],
            ['nama' => 'SOOBIN', 'jabatan' => 'Staff Kasi Pemerintahan', 'foto' => 'perangkat-desa-img/soobin.jpg', 'urutan' => 8],
            ['nama' => 'WENDY', 'jabatan' => 'Staff Kasi Kesejahteraan', 'foto' => 'perangkat-desa-img/wendy.jpg', 'urutan' => 9],
            ['nama' => 'HEESEUNG', 'jabatan' => 'Staff Kasi Pelayanan', 'foto' => 'perangkat-desa-img/heeseung.jpg', 'urutan' => 10],
            ['nama' => 'JAY', 'jabatan' => 'Kepala Dusun Cikondang', 'foto' => 'perangkat-desa-img/jay.jpg', 'urutan' => 11],
            ['nama' => 'TAEYONG', 'jabatan' => 'Kepala Dusun Genteng Wetan', 'foto' => 'perangkat-desa-img/taeyong.jpg', 'urutan' => 12],
            ['nama' => 'JIN', 'jabatan' => 'Kepala Dusun Genteng Kulon', 'foto' => 'perangkat-desa-img/jin.jpg', 'urutan' => 13],
            ['nama' => 'FELIX', 'jabatan' => 'Kepala Dusun Cikadu', 'foto' => 'perangkat-desa-img/felix.jpg', 'urutan' => 14],
        ];

        // Looping untuk memasukkan data ke database
        foreach ($perangkat as $item) {
            PerangkatDesa::create($item);
        }
    }
}