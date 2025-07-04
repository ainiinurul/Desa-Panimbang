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
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id();

            // Kolom untuk statistik wilayah (gunakan tipe decimal untuk angka berkoma)
            $table->decimal('total_wilayah', 8, 2)->default(0);
            $table->decimal('daratan', 8, 2)->default(0);
            $table->decimal('sawah', 8, 2)->default(0);
            $table->decimal('tanah_kas_desa', 8, 2)->default(0);
            $table->decimal('telaga', 8, 2)->default(0);
            $table->decimal('lain_lain', 8, 2)->default(0);

            // Kolom untuk deskripsi (gunakan tipe text untuk tulisan panjang)
            $table->text('geografis_deskripsi')->nullable();
            $table->text('iklim_deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayahs');
    }
};
