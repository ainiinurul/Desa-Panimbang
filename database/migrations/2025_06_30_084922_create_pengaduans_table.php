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
        Schema::create('pengaduans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('no_whatsapp');
        $table->string('keperluan');
        $table->text('isi_pesan');
        $table->string('status')->default('Masuk'); // Status default: Masuk, Diproses, Selesai
        $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
