@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-96 object-cover">
        @endif
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">{{ $berita->kategori }}</span>
                <span class="text-sm text-gray-500">{{ $berita->tanggal->format('d M Y') }}</span>
            </div>
            <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
            <div class="prose max-w-none">
                {!! $berita->deskripsi !!}
            </div>
        </div>
    </article>
</div>
@endsection