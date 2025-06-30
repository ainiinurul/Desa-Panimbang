<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - Desa Panimbang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="font-sans antialiased text-gray-800">
<x-navbar></x-navbar>

    <!-- Header -->
    <header class="bg-blue-900 text-white py-12 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Statistik Desa</h1>
            <p class="text-xl">Data statistik dan informasi mengenai Desa Panimbang</p>
        </div>
    </header>

    <!-- Statistics Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <!-- Kependudukan -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">1. Kependudukan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Penduduk Berdasarkan Jenis Kelamin</h3>
                        <div class="h-64">
                            <canvas id="chartJenisKelamin"></canvas>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <p class="text-gray-600">Laki-laki</p>
                                <p class="text-2xl font-bold text-blue-600">2,547</p>
                            </div>
                            <div class="text-center p-4 bg-pink-50 rounded-lg">
                                <p class="text-gray-600">Perempuan</p>
                                <p class="text-2xl font-bold text-pink-600">2,683</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Penduduk Berdasarkan Usia</h3>
                        <div class="h-64">
                            <canvas id="chartUsia"></canvas>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                <p class="text-gray-600">0-14 tahun</p>
                                <p class="text-xl font-bold text-blue-600">1,285</p>
                            </div>
                            <div class="text-center p-2 bg-green-50 rounded-lg">
                                <p class="text-gray-600">15-64 tahun</p>
                                <p class="text-xl font-bold text-green-600">3,654</p>
                            </div>
                            <div class="text-center p-2 bg-purple-50 rounded-lg col-span-2">
                                <p class="text-gray-600">65+ tahun</p>
                                <p class="text-xl font-bold text-purple-600">291</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pendidikan -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">2. Pendidikan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Tingkat Pendidikan Penduduk</h3>
                        <div class="h-64">
                            <canvas id="chartPendidikan"></canvas>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Fasilitas Pendidikan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col items-center p-4 bg-blue-50 rounded-lg">
                                <div class="text-blue-600 mb-2">
                                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">SD/MI</p>
                                <p class="text-2xl font-bold text-blue-600">5</p>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-green-50 rounded-lg">
                                <div class="text-green-600 mb-2">
                                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">SMP/MTs</p>
                                <p class="text-2xl font-bold text-green-600">1</p>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-yellow-50 rounded-lg">
                                <div class="text-yellow-600 mb-2">
                                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">SMA/MA</p>
                                <p class="text-2xl font-bold text-yellow-600">1</p>
                            </div>
                            <div class="flex flex-col items-center p-4 bg-purple-50 rounded-lg">
                                <div class="text-purple-600 mb-2">
                                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">PAUD/TK</p>
                                <p class="text-2xl font-bold text-purple-600">2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lahan -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">3. Lahan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Pembagian Lahan</h3>
                        <div class="h-64">
                            <canvas id="chartLahan"></canvas>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Detail Lahan (Hectare)</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-blue-50 rounded-lg">
                                <p class="text-gray-600">Total Wilayah</p>
                                <p class="text-2xl font-bold text-blue-600">444,23</p>
                            </div>
                            <div class="text-center p-4 bg-yellow-50 rounded-lg">
                                <p class="text-gray-600">Daratan</p>
                                <p class="text-2xl font-bold text-yellow-600">28,60</p>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-lg">
                                <p class="text-gray-600">Sawah</p>
                                <p class="text-2xl font-bold text-green-600">195,69</p>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-lg">
                                <p class="text-gray-600">Tanah Kas Desa</p>
                                <p class="text-2xl font-bold text-purple-600">25</p>
                            </div>
                            <div class="text-center p-4 bg-indigo-50 rounded-lg">
                                <p class="text-gray-600">Telaga</p>
                                <p class="text-2xl font-bold text-indigo-600">75,60</p>
                            </div>
                            <div class="text-center p-4 bg-pink-50 rounded-lg">
                                <p class="text-gray-600">Lain-lain</p>
                                <p class="text-2xl font-bold text-pink-600">84,40</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sarana Prasarana -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">4. Sarana Prasarana</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-blue-700">Kesehatan</h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Puskesmas</span>
                                <span class="font-semibold">1</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Posyandu</span>
                                <span class="font-semibold">4</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Bidan Desa</span>
                                <span class="font-semibold">2</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Apotek</span>
                                <span class="font-semibold">2</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-green-700">Ibadah</h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Masjid</span>
                                <span class="font-semibold">5</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Mushola</span>
                                <span class="font-semibold">8</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Gereja</span>
                                <span class="font-semibold">0</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Pura</span>
                                <span class="font-semibold">0</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <div class="flex items-center mb-4">
                            <div class="bg-yellow-100 p-3 rounded-full mr-4">
                                <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-yellow-700">Infrastruktur</h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Jalan Desa (km)</span>
                                <span class="font-semibold">12.5</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Jembatan</span>
                                <span class="font-semibold">3</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Saluran Irigasi (km)</span>
                                <span class="font-semibold">8.2</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-700">Menara BTS</span>
                                <span class="font-semibold">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- APB Desa -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">5. APB Desa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Anggaran Pendapatan Belanja Desa</h3>
                        <div class="h-64">
                            <canvas id="chartAPBDesa"></canvas>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Rincian Anggaran</h3>
                        <table class="w-full">
                            <thead>
                                <tr class="bg-blue-50">
                                    <th class="p-3 text-left text-gray-700">Kategori</th>
                                    <th class="p-3 text-right text-gray-700">Jumlah (Rp)</th>
                                    <th class="p-3 text-right text-gray-700">Persentase</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="p-3 text-gray-700">Pendapatan Asli Desa</td>
                                    <td class="p-3 text-right font-medium">124,500,000</td>
                                    <td class="p-3 text-right">10%</td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700">Dana Desa</td>
                                    <td class="p-3 text-right font-medium">747,000,000</td>
                                    <td class="p-3 text-right">60%</td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700">Alokasi Dana Desa</td>
                                    <td class="p-3 text-right font-medium">249,000,000</td>
                                    <td class="p-3 text-right">20%</td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700">Bantuan Provinsi</td>
                                    <td class="p-3 text-right font-medium">124,500,000</td>
                                    <td class="p-3 text-right">10%</td>
                                </tr>
                                <tr class="bg-blue-50">
                                    <td class="p-3 font-bold text-gray-700">Total</td>
                                    <td class="p-3 text-right font-bold">1,245,000,000</td>
                                    <td class="p-3 text-right font-bold">100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Posyandu -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">6. Posyandu</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Balita</h3>
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <p class="text-2xl font-bold text-blue-600">150</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Ibu Hamil</h3>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <p class="text-2xl font-bold text-green-600">0</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Posyandu</h3>
                        <div class="text-center p-4 bg-pink-50 rounded-lg">
                            <p class="text-2xl font-bold text-pink-600">2</p>
                        </div>
                    </div>
                </div>
                
                <!-- Add chart for Jumlah Balita Berdasarkan Umur -->
                <div class="mt-8 bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-700">Jumlah Balita Berdasarkan Umur</h3>
                    <div class="h-80">
                        <canvas id="chartBalitaUmur"></canvas>
                    </div>
                </div>
            </div>

            <!-- Add new section for Indeks Desa Membangun based on Image 2 -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 pb-2 border-b-2 border-blue-200">7. Indeks Desa Membangun (IDM)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-lg font-semibold mb-4 text-blue-700">Skor IDM Saat Ini</h3>
                        <div class="flex justify-between items-center">
                            <div class="text-4xl font-bold text-blue-600">0.55</div>
                            <div class="bg-orange-100 p-2 rounded-full">
                                <svg class="h-10 w-10 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-lg font-semibold mb-4 text-blue-700">Status IDM</h3>
                        <div class="flex justify-between items-center">
                            <div class="text-base font-medium text-gray-600">Sedang Berkembang</div>
                            <div class="bg-green-100 p-2 rounded-full">
                                <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-lg font-semibold mb-4 text-blue-700">Target Status</h3>
                        <div class="flex justify-between items-center">
                            <div class="text-base font-medium text-gray-600">Maju</div>
                            <div class="bg-red-100 p-2 rounded-full">
                                <svg class="h-10 w-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                        <h3 class="text-lg font-semibold mb-4 text-blue-700">Skor IDM Minimal</h3>
                        <div class="flex justify-between items-center">
                            <div class="text-base font-medium text-gray-600">0.50</div>
                            <div class="bg-purple-100 p-2 rounded-full">
                                <svg class="h-10 w-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add tabs for the years -->
                <div class="mt-8 bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                    <div class="flex border-b border-gray-200 mb-6">
                        <button class="py-2 px-4 text-blue-600 border-b-2 border-blue-600 font-medium">2024</button>
                        <button class="py-2 px-4 text-gray-500 font-medium">2023</button>
                    </div>
                    
                    <h3 class="text-xl font-semibold mb-6 text-blue-700">Indeks Desa Membangun (IDM) Tahun 2024</h3>
                    
                    <!-- Add chart for IDM components -->
                    <div class="h-80">
                        <canvas id="chartIDM"></canvas>
                    </div>
                    
                    <!-- Display IDM components and their values -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-blue-700 mb-2">IKL (Indeks Ketahanan Lingkungan)</h4>
                            <p class="text-2xl font-bold text-blue-600">0.6 / 60%</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-green-700 mb-2">IKS (Indeks Ketahanan Sosial)</h4>
                            <p class="text-2xl font-bold text-green-600">0.5 / 50%</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-yellow-700 mb-2">IKE (Indeks Ketahanan Ekonomi)</h4>
                            <p class="text-2xl font-bold text-yellow-600">0.4 / 40%</p>
                        </div>
                    </div>
                </div>
                
                <!-- Add location info -->
                <div class="mt-8 bg-white rounded-lg shadow-md p-6 transform transition-all duration-500 hover:shadow-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-700">Lokasi</h3>
                    <div class="grid grid-cols-1 gap-2">
                        <div class="p-3 border-b border-gray-100">
                            <p class="font-medium">Provinsi</p>
                            <p class="text-gray-700">Jawa Tengah</p>
                        </div>
                        <div class="p-3 border-b border-gray-100">
                            <p class="font-medium">Kabupaten</p>
                            <p class="text-gray-700">Cilacap</p>
                        </div>
                        <div class="p-3 border-b border-gray-100">
                            <p class="font-medium">Kecamatan</p>
                            <p class="text-gray-700">Cimanggu</p>
                        </div>
                        <div class="p-3">
                            <p class="font-medium">Desa</p>
                            <p class="text-gray-700">Panimbang</p>
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

    <!-- Chart.js Scripts -->
    <script>
        // Chart for Jenis Kelamin
        const ctxJenisKelamin = document.getElementById('chartJenisKelamin').getContext('2d');
        const chartJenisKelamin = new Chart(ctxJenisKelamin, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [2547, 2683],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Chart for Usia
        const ctxUsia = document.getElementById('chartUsia').getContext('2d');
        const chartUsia = new Chart(ctxUsia, {
            type: 'bar',
            data: {
                labels: ['0-14 Tahun', '15-64 Tahun', '65+ Tahun'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [1285, 3654, 291],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Chart for Pendidikan
        const ctxPendidikan = document.getElementById('chartPendidikan').getContext('2d');
        const chartPendidikan = new Chart(ctxPendidikan, {
            type: 'pie',
            data: {
                labels: ['SD', 'SMP', 'SMA', 'Perguruan Tinggi'],
                datasets: [{
                    label: 'Tingkat Pendidikan',
                    data: [1200, 800, 400, 100],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Chart for Lahan
        const ctxLahan = document.getElementById('chartLahan').getContext('2d');
        const chartLahan = new Chart(ctxLahan, {
            type: 'polarArea',
            data: {
                labels: ['Sawah', 'Daratan', 'Tanah Kas Desa', 'Telaga', 'Lain-lain'],
                datasets: [{
                    label: 'Luas Lahan (Hectare)',
                    data: [195.69, 28.60, 25, 75.60, 84.40],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Chart for APB Desa
        const ctxAPBDesa = document.getElementById('chartAPBDesa').getContext('2d');
        const chartAPBDesa = new Chart(ctxAPBDesa, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Anggaran (Rp)',
                    data: [100000000, 120000000, 110000000, 130000000, 140000000, 150000000, 160000000, 170000000, 180000000, 190000000, 200000000, 210000000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Chart for Balita berdasarkan umur
        const ctxBalitaUmur = document.getElementById('chartBalitaUmur').getContext('2d');
        const chartBalitaUmur = new Chart(ctxBalitaUmur, {
            type: 'bar',
            data: {
                labels: ['0-5', '6-11', '12-24', '25-59'],
                datasets: [
                    {
                        label: 'Laki-laki',
                        data: [15, 20, 25, 10], // Jumlah laki-laki per kelompok umur
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Perempuan',
                        data: [15, 20, 25, 20], // Jumlah perempuan per kelompok umur
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: false,
                        title: {
                            display: true,
                            text: 'Umur (Bulan)'
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Balita'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Chart for IDM (Indeks Desa Membangun)
        const ctxIDM = document.getElementById('chartIDM').getContext('2d');
        const chartIDM = new Chart(ctxIDM, {
            type: 'radar',
            data: {
                labels: ['IKL', 'IKS', 'IKE'],
                datasets: [{
                    label: 'Skor 2024',
                    data: [0.6, 0.5, 0.4], // Skor untuk IKL, IKS, dan IKE
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 1
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        // JavaScript untuk scroll-triggered animation
        document.addEventListener("DOMContentLoaded", function() {
            const countUpElements = document.querySelectorAll('.count-up');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        startCounting(entry.target);
                        observer.unobserve(entry.target); // Hentikan observasi setelah animasi dimulai
                    }
                });
            }, {
                threshold: 0.5 // Trigger saat 50% elemen terlihat di layar
            });

            countUpElements.forEach(element => {
                observer.observe(element);
            });

            function startCounting(element) {
                const target = +element.getAttribute('data-target');
                const duration = 2000; // Durasi animasi dalam milidetik
                const start = 0;
                const increment = target / (duration / 16); // 16ms per frame

                let current = start;
                const updateCount = () => {
                    current += increment;
                    if (current < target) {
                        element.textContent = Math.floor(current);
                        requestAnimationFrame(updateCount);
                    } else {
                        element.textContent = target;
                    }
                };

                updateCount();
            }
        });
    </script>
</body>
</html>