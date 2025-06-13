<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('kategori', ['Kesehatan', 'Pembangunan', 'Ekonomi', 'Pendidikan', 'Keamanan', 'Kegiatan']);
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->enum('status', ['draft', 'published', 'scheduled'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
    
};