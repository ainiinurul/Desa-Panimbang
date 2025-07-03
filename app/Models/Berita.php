<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug', // Biarkan kolom ini tetap ada untuk keperluan lain
        'user_id',
        'tanggal',
        'kategori',
        'deskripsi',
        'gambar',
        'status',
        'published_at'
    ];

    protected $dates = [
        'published_at',
        'tanggal',
        'created_at',
        'updated_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // HAPUS method getRouteKeyName()
}