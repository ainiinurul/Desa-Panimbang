<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - Desa Panimbang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        /* Custom CSS untuk warna nomor biru */
        .blue-numbering {
            counter-reset: item;
        }
        .blue-numbering li {
            display: block;
            margin-bottom: 0.5em;
        }
        .blue-numbering li:before {
            content: counter(item) ". ";
            counter-increment: item;
            color: #1d4ed8; /* blue-700 */
            font-weight: 600;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
<x-navbar></x-navbar>

    <!-- Header -->
    <header class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            {{-- DATA DINAMIS: Mengambil judul utama dari database --}}
            <h1 class="text-4xl font-bold mb-2">{{ $sejarah->judul_utama ?? 'Sejarah Desa Panimbang' }}</h1>
            
            {{-- DATA DINAMIS: Mengambil sub judul dari database --}}
            <p class="text-lg opacity-80">{{ $sejarah->sub_judul ?? 'Perjalanan dan perkembangan Desa Panimbang dari masa ke masa' }}</p>
        </div>
    </header>

    <!-- Sejarah Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-2/3">
                        {{-- DATA DINAMIS: Mengambil judul utama dan mengubahnya menjadi huruf kapital --}}
                        <h2 class="text-2xl font-bold text-blue-800 mb-6">{{ strtoupper($sejarah->judul_utama ?? 'SEJARAH DESA PANIMBANG') }}</h2>
                        
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {{-- DATA DINAMIS: Mengambil paragraf 1 dan 2 dari database --}}
                            <p class="mb-4">{{ $sejarah->paragraf_1 }}</p>
                            <p class="mb-4">{{ $sejarah->paragraf_2 }}</p>

                            {{-- DATA DINAMIS: Mengambil silsilah kepala desa dari database --}}
                            <p class="font-semibold text-lg text-blue-700">Berdasarkan wawancara narasumber Silsilah Kepala Desa Panimbang dari Awal :</p>
                            <ol class="blue-numbering space-y-2 mb-6 ml-4">
                                @foreach(explode("\n", $sejarah->silsilah_kepala_desa ?? '') as $item)
                                    @if(trim($item) !== '')
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ol>

                            {{-- DATA DINAMIS: Mengambil daftar dusun sebelum pemekaran dari database --}}
                            <p class="font-semibold text-lg text-blue-700">Sebelum pemekaran, wilayah Desa Panimbang terdiri dari tujuh dusun, yaitu:</p>
                            <ol class="blue-numbering space-y-2 mb-6 ml-4">
                                @foreach(explode("\n", $sejarah->sebelum_pemekaran ?? '') as $item)
                                    @if(trim($item) !== '')
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ol>

                            {{-- DATA DINAMIS: Mengambil penjelasan setelah pemekaran dari database --}}
                            <p class="font-semibold text-lg text-blue-700">Pada tahun 1980, di bawah kepemimpinan Bapak Rebin, Desa Panimbang dimekarkan menjadi dua desa:</p>
                            <ol class="blue-numbering space-y-2 mb-6 ml-4">
                                @foreach(explode("\n", $sejarah->setelah_pemekaran ?? '') as $item)
                                    @if(trim($item) !== '')
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ol>

                            {{-- DATA DINAMIS: Mengambil seluruh paragraf sejarah kantor desa dari database --}}
                            <div class="mb-4">{!! nl2br(e($sejarah->sejarah_kantor_desa)) !!}</div>
                        </div>
                    </div>
                    
                    {{-- Bagian sidebar ini dibiarkan statis karena isinya jarang berubah --}}
                    <div class="w-full md:w-1/3">
                        <div class="bg-blue-50 rounded-lg p-6 mb-6">
                            <h3 class="text-xl font-semibold text-blue-800 mb-4">Lambang Desa Panimbang</h3>
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('img/lambang_desa.jpg') }}" alt="Lambang Desa Panimbang" class="h-48 w-auto">
                            </div>
                            <p class="text-gray-700 text-sm italic text-center">Lambang Desa Panimbang melambangkan keberagaman dan kerukunan masyarakat</p>
                        </div>
                        
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-blue-800 mb-4">Tonggak Sejarah</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 text-blue-800 rounded-full w-12 h-12 flex items-center justify-center font-bold mr-4 flex-shrink-0">1830</div>
                                    <p class="text-gray-700">Awal berdirinya Desa Panimbang dengan Aki Pontang sebagai Kepala Desa pertama</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-blue-100 text-blue-800 rounded-full w-12 h-12 flex items-center justify-center font-bold mr-4 flex-shrink-0">1881</div>
                                    <p class="text-gray-700">Pemindahan kantor desa ke Cingaweul dusun Genteng Wetan</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-blue-100 text-blue-800 rounded-full w-12 h-12 flex items-center justify-center font-bold mr-4 flex-shrink-0">1980</div>
                                    <p class="text-gray-700">Pemekaran Desa Panimbang menjadi dua desa yaitu Desa Panimbang dan Desa Mandala</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                <!-- Kolom 1: Info Kontak -->
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
                
                <!-- Kolom 2: Peta Mini -->
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
                
                <!-- Kolom 3: Link Cepat & Sosial Media -->
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
            
            <!-- Newsletter Subscription -->
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
            
            <!-- Jam Operasional -->
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
                <!-- QR Code -->
                <div class="mt-4 md:mt-0 text-center">
                    <p class="mb-2">Scan untuk informasi lebih lanjut</p>
                    <div class="bg-white p-2 inline-block rounded">
                        <!-- Placeholder for QR Code - You can replace with actual QR code image -->
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
            
            <!-- Copyright & Politik Privasi -->
            <div class="border-t border-blue-800 mt-6 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>&copy; 2025 Desa Panimbang. Hak Cipta Dilindungi.</p>
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
        // Scroll animations
        document.addEventListener('DOMContentLoaded', function() {
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