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
        Schema::create('perangkat_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Kita gunakan 'nama' agar konsisten dengan seeder & controller
            $table->string('jabatan');
            $table->integer('urutan')->default(99); // Tambahkan urutan untuk sorting
            $table->string('foto')->nullable(); // Kita gunakan 'foto' agar konsisten
            
            // Kolom Detail dari PerangkatDesaController
            $table->string('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->text('alamat')->nullable(); // Gunakan text untuk alamat yang lebih panjang
            $table->string('telepon')->nullable();
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_desas');
    }
};
