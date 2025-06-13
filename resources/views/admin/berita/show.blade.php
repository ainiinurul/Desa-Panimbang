@extends('layouts.app')

@section('content')
<div class="container py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Konten Utama -->
        <article class="bg-white rounded-lg shadow-md overflow-hidden flex-1">
            @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-96 object-cover">
            @endif
            
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="inline-block px-3 py-1 {{ $categoryColors[$berita->kategori] ?? 'bg-gray-100 text-gray-800' }} rounded-full text-xs">
                        {{ $berita->kategori }}
                    </span>
                    <div class="text-sm text-gray-500">
                        <span>{{ $berita->tanggal->format('d F Y') }}</span>
                        @if($berita->author)
                        <span class="mx-2">•</span>
                        <span>Oleh: {{ $berita->author->name }}</span>
                        @endif
                    </div>
                </div>
                
                <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
                
                <div class="prose max-w-none">
                    {!! $berita->deskripsi !!}  <!-- Perhatikan ini menggunakan deskripsi atau isi -->
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            </div>
        </article>

        <!-- Sidebar untuk Berita Terkait -->
        <aside class="w-full md:w-80">
            <div class="bg-white rounded-lg shadow-md p-4 sticky top-4">
                <h3 class="text-lg font-semibold mb-4">Berita Terkait</h3>
                @if($related->count() > 0)
                    <div class="space-y-4">
                        @foreach($related as $item)
                        <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                            <a href="{{ route('berita.show', $item->slug) }}" class="block hover:text-blue-600 transition-colors">
                                <h4 class="font-medium">{{ $item->judul }}</h4>
                                <p class="text-sm text-gray-500 mt-1">{{ $item->tanggal->format('d M Y') }}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-sm">Tidak ada berita terkait</p>
                @endif
            </div>
        </aside>
    </div>
</div>
@endsection

@php
    $categoryColors = [
        'Kesehatan' => 'bg-green-100 text-green-800',
        'Pembangunan' => 'bg-yellow-100 text-yellow-800',
        'Ekonomi' => 'bg-yellow-100 text-yellow-800',
        'Pendidikan' => 'bg-blue-100 text-blue-800',
        'Keamanan' => 'bg-red-100 text-red-800',
        'Kegiatan' => 'bg-purple-100 text-purple-800',
    ];
@endphp