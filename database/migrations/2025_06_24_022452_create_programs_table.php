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
        Schema::create('programs', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('kategori');
        $table->text('deskripsi');
        $table->string('gambar')->nullable();
        $table->string('periode');
        $table->string('link')->nullable();

        // --- TAMBAHKAN DUA BARIS INI ---
        $table->string('status')->default('published');
        $table->timestamp('published_at')->nullable();
        // -----------------------------

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
