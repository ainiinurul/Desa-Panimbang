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
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap permohonan
            $table->string('nama_pemohon'); // Nama lengkap pemohon
            $table->string('nik_pemohon', 16); // NIK pemohon
            $table->string('jenis_surat'); // Jenis surat yang diminta (cth: Surat Keterangan Usaha)
            $table->text('keperluan'); // Deskripsi keperluan surat
            $table->string('nomor_telepon'); // Nomor telepon yang bisa dihubungi
            $table->enum('status', ['Pending', 'Diproses', 'Selesai', 'Ditolak'])->default('Pending'); // Status permohonan
            $table->text('catatan_admin')->nullable(); // Catatan dari admin (jika ada)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanans');
    }
};
