<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFormattedTanggalAttribute()
    {
        return $this->tanggal 
            ? \Carbon\Carbon::parse($this->tanggal)->format('d M Y')
            : null;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('d F Y') : null;
    }
}