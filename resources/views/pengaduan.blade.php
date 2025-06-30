<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan - Desa Panimbang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased text-gray-800">
<x-navbar></x-navbar>

    <!-- Header -->
    <header class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4 transform transition-all duration-500 translate-y-0 opacity-100">Layanan Pengaduan</h1>
            <p class="text-lg max-w-2xl mx-auto transform transition-all duration-700 delay-100 translate-y-0 opacity-100">
                Sampaikan aduan, saran, atau pertanyaan Anda kepada kami. Kami akan menanggapi dengan segera untuk memberikan pelayanan terbaik bagi masyarakat Desa Panimbang.
            </p>
        </div>
    </header>

    <!-- Form Pengaduan -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-500 hover:shadow-xl">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Form Pengaduan</h2>
                    <form id="formPengaduan">
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="whatsapp" class="block text-gray-700 font-medium mb-2">No. WhatsApp</label>
                            <input type="tel" id="whatsapp" name="whatsapp" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 08123456789" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="keperluan" class="block text-gray-700 font-medium mb-2">Keperluan</label>
                            <select id="keperluan" name="keperluan" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="" disabled selected>Pilih keperluan</option>
                                <option value="umum">Umum</option>
                                <option value="permohonan">Permohonan</option>
                                <option value="aduan">Aduan</option>
                                <option value="saran">Saran</option>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label for="pesan" class="block text-gray-700 font-medium mb-2">Isi Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tuliskan pesan Anda secara detail..." required></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Pengaduan -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Informasi Layanan Pengaduan</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold">Waktu Respon</h3>
                        </div>
                        <p class="text-gray-700">Pengaduan yang masuk akan diproses dalam waktu 1-5 hari kerja. Status pengaduan Anda dapat dicek melalui nomor WhatsApp yang terdaftar.</p>
                    </div>
                    
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold">Jenis Pengaduan</h3>
                        </div>
                        <p class="text-gray-700">Anda dapat menyampaikan pengaduan terkait infrastruktur, pelayanan publik, administrasi, atau hal lain yang berkaitan dengan Desa Panimbang.</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold">Tindak Lanjut</h3>
                        </div>
                        <p class="text-gray-700">Setiap pengaduan akan diteruskan ke perangkat desa terkait untuk mendapatkan tindak lanjut dan penyelesaian yang sesuai.</p>
                    </div>
                    
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md transform transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold">Privasi</h3>
                        </div>
                        <p class="text-gray-700">Informasi pribadi Anda akan terjaga kerahasiaannya dan hanya digunakan untuk keperluan respon pengaduan.</p>
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
                        <img src="images/logo_cilacap.png" alt="Logo Cilacap" class="h-14 w-auto mr-3">
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
        // Form submission handler
        document.getElementById('formPengaduan').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const nama = document.getElementById('nama').value;
            const whatsapp = document.getElementById('whatsapp').value;
            const keperluan = document.getElementById('keperluan').value;
            const pesan = document.getElementById('pesan').value;
            
            // Here you would typically send the data to a server
            // For demo purposes, we'll just show an alert
            alert(`Terima kasih ${nama}! Pengaduan Anda telah diterima. Kami akan menghubungi Anda melalui WhatsApp ${whatsapp} segera.`);
            
            // Reset form
            this.reset();
        });
        
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