@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul ?? 'Detail Berita' }} - Desa Panimbang</title>
    
    {{-- Preload CSS untuk menghindari flicker --}}
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" as="style">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    {{-- Inisialisasi Alpine.js lebih awal --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    {{-- CSS untuk mencegah dropdown flicker --}}
    <style>
        /* Sembunyikan dropdown saat loading */
        [x-cloak] { display: none !important; }
        
        /* Smooth transition untuk dropdown */
        .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px);
        }
        .dropdown-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.2s ease-out;
        }
        
        /* Styling untuk konten */
        .content-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Improve text rendering */
        .prose {
            line-height: 1.75;
            font-size: 1.1rem;
        }
        
        /* Custom button styling */
        .btn-primary {
            background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }
        
        /* Card styling */
        .news-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Badge styling - removed static styling karena akan dinamis */
        .badge {
            transition: all 0.3s ease;
        }
        
        .badge:hover {
            transform: scale(1.05);
        }
    </style>
</head>

@php
    // Logika untuk menentukan kelas warna Tailwind CSS berdasarkan kategori
    $kategoriClasses = '';
    switch (strtolower($berita->kategori)) {
        case 'pembangunan':
            $kategoriClasses = 'bg-indigo-100 text-indigo-800 border-indigo-300';
            break;
        case 'ekonomi':
            $kategoriClasses = 'bg-purple-100 text-purple-800 border-purple-300';
            break;
        case 'kesehatan':
            $kategoriClasses = 'bg-green-100 text-green-800 border-green-300';
            break;
        case 'pendidikan':
            $kategoriClasses = 'bg-yellow-100 text-yellow-800 border-yellow-300';
            break;
        case 'keamanan':
            $kategoriClasses = 'bg-red-100 text-red-800 border-red-300';
            break;
        case 'kegiatan':
            $kategoriClasses = 'bg-pink-100 text-pink-800 border-pink-300';
            break;
        case 'pemerintahan':
            $kategoriClasses = 'bg-gray-100 text-gray-800 border-gray-300';
            break;
        default:
            $kategoriClasses = 'bg-blue-100 text-blue-800 border-blue-300';
            break;
    }
@endphp

<main class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">

    {{-- Main Content --}}
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">

                {{-- Kolom Utama: Isi Berita --}}
                <div class="w-full">
                    
                    {{-- News Header Card --}}
                    <div class="news-card content-fade-in p-8 mb-8">
                        
                        {{-- News Title --}}
                        <div class="text-center mb-8">
                            <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">
                                {{ $berita->judul }}
                            </h1>
                            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                                Berita terkini dari Desa Panimbang untuk masyarakat
                            </p>
                        </div>

                        {{-- News Meta Info --}}
                        <div class="flex flex-wrap justify-center gap-6 mb-8">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-sm text-gray-500 font-medium">Kategori:</span>
                                <span class="badge px-4 py-2 rounded-full text-sm font-semibold border {{ $kategoriClasses }}">
                                    {{ $berita->kategori }}
                                </span>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-3-16h.01M12 8h.01"></path>
                                </svg>
                                <span class="text-sm text-gray-500 font-medium">Tanggal:</span>
                                <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold border border-green-300">
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->isoFormat('dddd, D MMMM Y') }}
                                </span>
                            </div>
                        </div>

                        {{-- News Image --}}
                        @if($berita->gambar)
                            <div class="relative mb-8">
                                <div class="overflow-hidden rounded-2xl shadow-2xl">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                         alt="Gambar {{ $berita->judul }}" 
                                         class="w-full h-auto max-h-96 object-cover transform hover:scale-105 transition-transform duration-700">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                            </div>
                        @endif

                    </div>

                    {{-- News Content Card --}}
                    <div class="news-card content-fade-in p-8 mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-gradient-to-b from-blue-500 to-purple-500 rounded-full mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Isi Berita</h2>
                        </div>
                        
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! $berita->deskripsi !!}
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="text-center content-fade-in">
                        <a href="{{ url('/') }}" class="btn-primary inline-flex items-center text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>
</main>

{{-- Script untuk menghindari flicker --}}
<script>
    // Pastikan Alpine.js sudah siap sebelum menampilkan konten
    document.addEventListener('alpine:init', () => {
        // Sembunyikan loading dan tampilkan konten
        document.body.classList.remove('loading');
    });
    
    // Preload gambar untuk performa lebih baik
    window.addEventListener('load', function() {
        const images = document.querySelectorAll('img[data-src]');
        images.forEach(img => {
            img.src = img.dataset.src;
            img.onload = function() {
                this.classList.add('loaded');
            };
        });
    });
    
    // Smooth scrolling untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endsection