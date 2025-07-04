<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sejarahs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_utama')->default('Sejarah Desa Panimbang');
            $table->string('sub_judul')->default('Perjalanan dan perkembangan Desa Panimbang dari masa ke masa');
            $table->text('paragraf_1'); // Untuk paragraf tentang Pasukan Diponegoro
            $table->text('paragraf_2'); // Untuk paragraf tentang asal usul nama desa
            $table->text('silsilah_kepala_desa'); // Untuk menyimpan daftar kepala desa
            $table->text('sebelum_pemekaran'); // Untuk menyimpan daftar dusun sebelum pemekaran
            $table->text('setelah_pemekaran'); // Untuk penjelasan pemekaran desa
            $table->text('sejarah_kantor_desa'); // Gabungan beberapa paragraf akhir tentang kantor desa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarahs');
    }
};
