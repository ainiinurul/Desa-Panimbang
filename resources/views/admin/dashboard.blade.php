@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <!-- Total Berita Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
                <i class="fas fa-newspaper text-blue-500"></i>
            </div>
            <div>
                <p class="text-gray-600">Total Berita</p>
                <h3 class="text-2xl font-bold">{{ $totalBerita }}</h3>
            </div>
        </div>
    </div>

    <!-- Published Berita Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-full mr-4">
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
            <div>
                <p class="text-gray-600">Published</p>
                <h3 class="text-2xl font-bold">{{ $publishedBerita }}</h3>
            </div>
        </div>
    </div>

    <!-- Scheduled Berita Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                <i class="fas fa-clock text-yellow-500"></i>
            </div>
            <div>
                <p class="text-gray-600">Scheduled</p>
                <h3 class="text-2xl font-bold">{{ $scheduledBerita }}</h3>
            </div>
        </div>
    </div>

    <!-- Draft Berita Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="bg-gray-100 p-3 rounded-full mr-4">
                <i class="fas fa-file-alt text-gray-500"></i>
            </div>
            <div>
                <p class="text-gray-600">Draft</p>
                <h3 class="text-2xl font-bold">{{ $draftBerita }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Berita per Kategori -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Berita per Kategori</h3>
        <div class="space-y-4">
            @foreach($beritaByKategori as $item)
            <div class="flex items-center justify-between">
                <span class="text-gray-700">{{ $item->kategori }}</span>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                    {{ $item->total }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Berita Terbaru</h3>
        <div class="space-y-4">
            @php
                $latestBerita = App\Models\Berita::latest()->take(5)->get();
            @endphp
            
            @forelse($latestBerita as $berita)
            <div class="border-b pb-2 last:border-b-0">
                <div class="flex justify-between items-center">
                    <p class="font-medium">{{ Str::limit($berita->judul, 40) }}</p>
                    <span class="text-xs 
                        @if($berita->status == 'published') bg-green-100 text-green-800 
                        @elseif($berita->status == 'scheduled') bg-yellow-100 text-yellow-800 
                        @else bg-gray-100 text-gray-800 @endif
                        px-2.5 py-0.5 rounded-full">
                        {{ ucfirst($berita->status) }}
                    </span>
                </div>
                <p class="text-xs text-gray-500">{{ $berita->formatted_tanggal }}</p>
            </div>
            @empty
            <p class="text-gray-500 text-center">Belum ada berita</p>
            @endforelse
        </div>
    </div>
</div>
@endsection