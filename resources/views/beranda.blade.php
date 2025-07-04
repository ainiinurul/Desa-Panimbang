<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Panimbang - Kabupaten Cilacap</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased text-gray-800">
<x-navbar></x-navbar>

    <header class="relative">
        <div class="bg-cover bg-center h-screen" style="background-image: url('{{ isset($settings['header_background_image']) ? asset('storage/' . $settings['header_background_image']) : asset('img/desa.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative container mx-auto px-6 h-full flex flex-col justify-center items-center text-white text-center">
                <!-- Main Title -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight transform transition-all duration-500 translate-y-0 opacity-100">
                    Selamat Datang di<br>
                    <span class="text-blue-400">Desa Panimbang</span>
                </h1>
                
                <!-- Subtitle -->
                <div class="max-w-4xl mx-auto mb-8">
                    <p class="text-xl md:text-2xl lg:text-3xl font-light leading-relaxed transform transition-all duration-700 delay-100 translate-y-0 opacity-100">
                        Desa Panimbang merupakan salah satu desa di Kabupaten Cilacap yang kaya akan sejarah dan budaya.
                    </p>
                </div>
                
                <!-- Description -->
                <div class="max-w-3xl mx-auto mb-10">
                    <p class="text-lg md:text-xl font-normal leading-relaxed opacity-90 transform transition-all duration-700 delay-200 translate-y-0 opacity-100">
                        Kami memiliki berbagai potensi alam dan masyarakat yang ramah untuk membangun masa depan yang lebih baik.
                    </p>
                </div>
                
                <!-- CTA Button (Optional) -->
                <div class="transform transition-all duration-700 delay-300 translate-y-0 opacity-100">
                    <button onclick="scrollToSection('peta-informasi')" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Jelajahi Desa Kami
                    </button>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 bg-gray-50" id="peta-informasi">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:shadow-xl">
                    <h2 class="text-xl font-semibold p-4 border-b">Peta Desa Panimbang</h2>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11355.56292625439!2d108.8696549!3d-7.36181455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f809a8f839a91%3A0x5027a76e3571600!2sPanimbang%2C%20Kec.%20Cimanggu%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1740842046892!5m2!1sid!2sid" 
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:shadow-xl">
                    <h2 class="text-xl font-semibold p-4 border-b">Informasi Waktu & Cuaca</h2>
                    <div class="p-4 grid grid-cols-2 gap-6">
                        {{-- Waktu (sudah otomatis dari script bawaan) --}}
                        <div class="text-center p-4 bg-blue-50 rounded-lg transform transition-all duration-500 hover:scale-105">
                            <h3 class="text-lg font-medium mb-2">Waktu</h3>
                            <p class="text-2xl font-bold text-blue-600" id="time">10:25:00</p>
                            <p class="text-gray-600" id="date">Sabtu, 1 Maret 2025</p>
                        </div>

                        {{-- Suhu (akan diisi oleh script cuaca) --}}
                        <div class="text-center p-4 bg-blue-50 rounded-lg transform transition-all duration-500 hover:scale-105">
                            <h3 class="text-lg font-medium mb-2">Suhu</h3>
                            <div class="flex justify-center items-center h-10 w-10 mx-auto text-yellow-500">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <p class="text-2xl font-bold text-blue-600" id="suhu-utama">Memuat...</p>
                            <p class="text-gray-600 text-sm" id="suhu-terasa">-</p>
                        </div>

                        {{-- Cuaca (akan diisi oleh script cuaca) --}}
                        <div class="col-span-2 text-center p-4 bg-blue-50 rounded-lg transform transition-all duration-500 hover:scale-105">
                            <h3 class="text-lg font-medium mb-2">Cuaca</h3>
                            <p class="text-xl font-bold text-blue-600" id="deskripsi-cuaca">-</p>
                            <p class="text-gray-600" id="kelembapan">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="w-64 h-auto transform transition-all duration-500 hover:scale-105">
                        <img src="{{ asset('storage/' . ($settings['foto_kepala_desa'] ?? '')) }}" alt="{{ $settings['nama_kepala_desa'] ?? 'Kepala Desa' }} - Kepala Desa" class="w-full h-full object-cover rounded-lg shadow-md">
                    </div>
                </div>
                <div class="w-full md:w-2/3">
                    <h2 class="text-3xl font-bold text-blue-800 mb-4">"Selamat Datang di Website Desa Kami"</h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">{!! formatContent($settings['sambutan_kepala_desa'] ?? 'Sambutan belum diatur.') !!}</p>
                    <p class="text-right font-semibold text-blue-700">{{ $settings['nama_kepala_desa'] ?? '' }},<br>Kepala Desa Panimbang</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-8">Visi & Misi Desa Panimbang</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="mb-8">
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Selamat datang di halaman Visi dan Misi PPID Desa Panimbang. Di sini kami menyediakan akses terhadap informasi publik yang transparan dan akuntabel. Visi kami mencerminkan pandangan jangka panjang kami dalam membangun masyarakat desa yang terlibat aktif dalam pembangunan di desa.
                        </p>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Misi kami menjabarkan langkah-langkah konkret yang kami ambil untuk mewujudkan visi tersebut. Ini mencakup komitmen kami dalam melayani Anda dengan standar pelayanan yang tinggi, serta upaya kami dalam memastikan bahwa setiap warga desa memiliki akses yang sama terhadap informasi yang penting dan relevan.
                        </p>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Visi dan Misi ini adalah landasan kerja kami dan merupakan bagian integral dari komitmen kami untuk membangun tata kelola yang terbuka dan partisipatif. Kami mengundang Anda untuk menyimak lebih lanjut dan memahami arah dan tujuan kami dalam melayani komunitas Desa Panimbang.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-blue-50 rounded-lg p-6 transform transition-all duration-500 hover:shadow-lg">
                            <h3 class="text-2xl font-bold text-blue-800 mb-4">Visi</h3>
                            <div class="text-gray-700 leading-relaxed">
                                {!! formatContent($settings['visi_desa'] ?? 'Visi belum diatur.') !!}
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 rounded-lg p-6 transform transition-all duration-500 hover:shadow-lg">
                            <h3 class="text-2xl font-bold text-blue-800 mb-4">Misi</h3>
                            <div class="text-gray-700 leading-relaxed space-y-3">
                                {!! formatContent($settings['misi_desa'] ?? 'Misi belum diatur.') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM DESA --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-8">Program Unggulan Desa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($programDesa as $program)
                    @php
                        // Logika untuk menentukan kelas warna Tailwind CSS berdasarkan kategori
                        $kategoriClasses = '';
                        switch (strtolower($program->kategori)) {
                            case 'pembangunan':
                                $kategoriClasses = 'bg-blue-100 text-blue-800';
                                break;
                            case 'ekonomi':
                                $kategoriClasses = 'bg-yellow-100 text-yellow-800';
                                break;
                            case 'kesehatan':
                                $kategoriClasses = 'bg-green-100 text-green-800';
                                break;
                            case 'pendidikan':
                                $kategoriClasses = 'bg-indigo-100 text-indigo-800';
                                break;
                            case 'keamanan':
                                $kategoriClasses = 'bg-red-100 text-red-800';
                                break;
                            case 'kegiatan':
                            case 'pemerintahan':
                            default:
                                $kategoriClasses = 'bg-gray-100 text-gray-800';
                                break;
                        }
                    @endphp

                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:shadow-xl flex flex-col">
                        <a href="{{ $program->link ? url($program->link) : '#' }}" target="_blank" rel="noopener noreferrer">
                            @if($program->gambar)
                                <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-full h-48 object-cover">
                            @else
                                {{-- Gambar default jika tidak ada gambar program --}}
                                <img src="https://via.placeholder.com/600x400.png/28a745/FFFFFF?text=Program+Desa" alt="Default Image" class="w-full h-48 object-cover">
                            @endif
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <span class="inline-block px-3 py-1 text-xs mb-2 rounded-full self-start {{ $kategoriClasses }}">{{ $program->kategori }}</span>
                            <h3 class="text-xl font-semibold mb-2 mt-2">
                                <a href="{{ $program->link ? url($program->link) : '#' }}" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600 transition-colors duration-300">{{ $program->judul }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4 flex-grow">{{ Str::limit(strip_tags($program->deskripsi), 100) }}</p>
                            <div class="flex justify-between items-center text-sm text-gray-500 mt-auto">
                                <span>Periode: {{ $program->periode }}</span>
                                @if($program->link)
                                    <a href="{{ url($program->link) }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-blue-800 font-medium">Selengkapnya →</a>
                                @endif
                            </div>
                        </div>
                    </div>

                @empty
                    {{-- Tampilan jika tidak ada program sama sekali --}}
                    <div class="col-span-1 md:col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Saat ini belum ada program unggulan yang ditampilkan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    {{-- BERITA DESA --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-8">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($berita as $item)
                    @php
                        // Logika untuk menentukan kelas warna Tailwind CSS berdasarkan nama kategori.
                        // strtolower() digunakan agar tidak terpengaruh huruf besar/kecil (misal: "Kesehatan" dan "kesehatan" akan sama).
                        $kategoriClasses = '';
                        switch (strtolower($item->kategori)) {
                            case 'pembangunan':
                                $kategoriClasses = 'bg-blue-100 text-blue-800';
                                break;
                            case 'kesehatan':
                                $kategoriClasses = 'bg-green-100 text-green-800';
                                break;
                            case 'ekonomi':
                                $kategoriClasses = 'bg-yellow-100 text-yellow-800';
                                break;
                            case 'pendidikan':
                                $kategoriClasses = 'bg-indigo-100 text-indigo-800';
                                break;
                            case 'keamanan':
                                $kategoriClasses = 'bg-red-100 text-red-800';
                                break;
                            case 'pemerintahan':
                                $kategoriClasses = 'bg-gray-100 text-gray-800';
                                break;
                            default:
                                // Warna default jika kategori tidak ada dalam daftar di atas.
                                $kategoriClasses = 'bg-purple-100 text-purple-800';
                                break;
                        }
                    @endphp
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:shadow-xl cursor-pointer">
                        @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-72 object-cover">
                        @else
                        <img src="{{ asset('img/berita/default.jpg') }}" alt="Default Image" class="w-full h-72 object-cover">
                        @endif
                        <div class="p-4">
                            {{-- Kelas warna sekarang dinamis dari variabel $kategoriClasses --}}
                            <span class="inline-block px-3 py-1 {{ $kategoriClasses }} rounded-full text-xs mb-2">{{ $item->kategori }}</span>
                            <h3 class="text-xl font-semibold mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($item->deskripsi, 150) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                                <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-600 hover:text-blue-800 font-medium">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Tampilan jika tidak ada berita sama sekali --}}
                    <div class="col-span-1 md:col-span-2 text-center py-12">
                        <p class="text-gray-500 text-lg">Saat ini belum ada berita terbaru yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                <div>
                    <div class="flex items-center mb-4">
                        <img src="img/logo_cilacap.png" alt="Logo Cilacap" class="h-14 w-auto mr-3">
                        <div>
                            <h3 class="text-lg font-bold">DESA PANIMBANG</h3>
                            <p class="text-sm">Kabupaten Cilacap, Jawa Tengah</p>
                        </div>
                    </div>
                    <p class="mb-4">Jl. Raya Panimbang No. 123, Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah 53211</p>
                    <div class="space-y-2">
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            desapanimbang@gmail.com
                        </p>
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            (0282) 12345678
                        </p>
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            0812-3456-7890
                        </p>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Lokasi Kami</h3>
                    <div class="h-48 rounded-lg overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11355.56292625439!2d108.8696549!3d-7.36181455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f809a8f839a91%3A0x5027a76e3571600!2sPanimbang%2C%20Kec.%20Cimanggu%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1740842046892!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                    <p class="text-sm mt-2">Klik pada peta untuk melihat lokasi lebih detail</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 mb-6">
                        <li><a href="{{ route('sejarah') }}" class="hover:text-blue-300 transition-colors">Sejarah Desa</a></li>
                        <li><a href="{{ route('pengaduan') }}" class="hover:text-blue-300 transition-colors">Layanan Pengaduan</a></li>
                        <li><a href="{{ route('pelayanan') }}" class="hover:text-blue-300 transition-colors">Pelayanan Online</a></li>
                        <li><a href="{{ route('statistik') }}" class="hover:text-blue-300 transition-colors">Statistik Desa</a></li>
                    </ul>
                    
                    <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-800 p-6 rounded-lg mb-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-bold">Berlangganan Berita Desa</h3>
                        <p class="text-blue-100">Dapatkan informasi dan berita terbaru dari Desa Panimbang</p>
                    </div>
                    <div class="w-full md:w-1/3">
                        <form class="flex">
                            <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg w-full text-gray-800 focus:outline-none">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg transition-colors">Langganan</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold mb-2">Jam Operasional Kantor Desa</h3>
                    <div class="flex space-x-4">
                        <div>
                            <p class="font-medium">Senin - Kamis:</p>
                            <p>08:00 - 16:00 WIB</p>
                        </div>
                        <div>
                            <p class="font-medium">Jumat:</p>
                            <p>08:00 - 14:30 WIB</p>
                        </div>
                        <div>
                            <p class="font-medium">Sabtu - Minggu:</p>
                            <p>Tutup</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 text-center">
                    <p class="mb-2">Scan untuk informasi lebih lanjut</p>
                    <div class="bg-white p-2 inline-block rounded">
                        <svg class="h-24 w-24 text-blue-900" viewBox="0 0 100 100" fill="currentColor">
                            <rect x="20" y="20" width="60" height="60" fill="white"/>
                            <rect x="30" y="30" width="10" height="10"/>
                            <rect x="60" y="30" width="10" height="10"/>
                            <rect x="30" y="60" width="10" height="10"/>
                            <rect x="40" y="40" width="20" height="20"/>
                            <rect x="50" y="30" width="10" height="10"/>
                            <rect x="30" y="40" width="10" height="10"/>
                            <rect x="30" y="50" width="10" height="10"/>
                            <rect x="60" y="50" width="10" height="10"/>
                            <rect x="50" y="60" width="10" height="10"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-6 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2025 Desa Panimbang. Hak Cipta Dilindungi.</p>
                    <div class="flex space-x-4 mt-2 md:mt-0">
                        <a href="#" class="hover:text-blue-300 transition-colors">Ketentuan Penggunaan</a>
                        <a href="#" class="hover:text-blue-300 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-blue-300 transition-colors">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk mengambil data cuaca dan menampilkannya
        function fetchWeather() {
            // --- KONFIGURASI CUACA ---
            // Ganti 'KEY_API_KAMU' dengan API Key yang kamu dapatkan dari OpenWeatherMap
            const apiKey = '56009fc4565363d27f57cb1864a64b9c'; // <-- JANGAN LUPA GANTI DENGAN KEY-MU!
            const lat = -7.4815; // Latitude untuk Desa Panimbang
            const lon = 108.8475; // Longitude untuk Desa Panimbang
            const unit = 'metric';
            const lang = 'id';
            const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=${unit}&lang=${lang}`;

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data cuaca');
                    return response.json();
                })
                .then(data => {
                    const suhu = data.main.temp;
                    const terasaSeperti = data.main.feels_like;
                    const deskripsi = data.weather[0].description;
                    const kelembapan = data.main.humidity;

                    const suhuFormatted = `${Math.round(suhu)}°C`;
                    const terasaSepertiFormatted = `Terasa seperti ${Math.round(terasaSeperti)}°C`;
                    const deskripsiFormatted = deskripsi.replace(/\b\w/g, char => char.toUpperCase());
                    const kelembapanFormatted = `Kelembapan: ${kelembapan}%`;

                    document.getElementById('suhu-utama').textContent = suhuFormatted;
                    document.getElementById('suhu-terasa').textContent = terasaSepertiFormatted;
                    document.getElementById('deskripsi-cuaca').textContent = deskripsiFormatted;
                    document.getElementById('kelembapan').textContent = kelembapanFormatted;
                })
                .catch(error => {
                    console.error('Terjadi masalah:', error);
                    document.getElementById('deskripsi-cuaca').textContent = 'Gagal memuat data';
                });
        }

        // Fungsi untuk memperbarui jam dan tanggal
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            document.getElementById('time').textContent = `${hours}:${minutes}:${seconds}`;

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            document.getElementById('date').textContent = `${day}, ${date} ${month} ${year}`;
        }

        // Fungsi untuk scroll ke section
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Event listener utama yang berjalan setelah halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Jalankan fungsi cuaca
            fetchWeather();
            
            // 2. Jalankan fungsi jam dan atur agar update setiap detik
            updateTime();
            setInterval(updateTime, 1000);

            // 3. Atur animasi scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                observer.observe(section);
            });
        });
    </script>
</body>
</html>