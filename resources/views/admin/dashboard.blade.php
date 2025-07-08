@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Bagian Welcome Banner --}}
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold">Selamat Datang Kembali, {{ Auth::user()->name }}!</h2>
        <p class="mt-1">Berikut adalah ringkasan data terbaru dari Desa Panimbang.</p>
    </div>

    {{-- Ringkasan Data Utama (4 Kartu) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-gray-600">Total Penduduk</p>
                <h3 class="text-3xl font-bold">{{ number_format(($statistik->penduduk_pria ?? 0) + ($statistik->penduduk_wanita ?? 0)) }}</h3>
            </div>
            <div class="bg-blue-100 p-4 rounded-full">
                <i class="fas fa-users text-2xl text-blue-500"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-gray-600">Luas Wilayah</p>
                <h3 class="text-3xl font-bold">{{ number_format($wilayah->total_wilayah ?? 0, 2) }} Ha</h3>
            </div>
            <div class="bg-green-100 p-4 rounded-full">
                <i class="fas fa-map-marked-alt text-2xl text-green-500"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-gray-600">Total Berita</p>
                <h3 class="text-3xl font-bold">{{ $totalBerita }}</h3>
            </div>
            <div class="bg-yellow-100 p-4 rounded-full">
                <i class="fas fa-newspaper text-2xl text-yellow-500"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-gray-600">Total Anggaran</p>
                <h3 class="text-3xl font-bold">Rp {{ number_format(($statistik->apb_pad ?? 0) + ($statistik->apb_dana_desa ?? 0) + ($statistik->apb_alokasi_dana ?? 0) + ($statistik->apb_bantuan ?? 0)) }}</h3>
            </div>
            <div class="bg-purple-100 p-4 rounded-full">
                <i class="fas fa-wallet text-2xl text-purple-500"></i>
            </div>
        </div>
    </div>

    {{-- Bagian Grafik dan Berita Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Populasi Berdasarkan Kelompok Usia</h3>
            <div class="h-80">
                <canvas id="chartPopulasiUsia"></canvas>
            </div>
        </div>
        {{-- KARTU BARU DENGAN TAB BERITA & PROGRAM --}}
        <div x-data="{ activeTab: 'berita' }" class="bg-white rounded-lg shadow">
            {{-- Header dengan Tombol Tab --}}
            <div class="flex border-b">
                <button @click="activeTab = 'berita'" 
                        :class="{'border-blue-500 text-blue-600': activeTab === 'berita', 'border-transparent text-gray-500 hover:text-gray-700': activeTab !== 'berita'}"
                        class="flex-1 font-medium px-4 py-3 border-b-2 focus:outline-none transition-colors duration-300">
                    Berita Terbaru
                </button>
                <button @click="activeTab = 'program'"
                        :class="{'border-blue-500 text-blue-600': activeTab === 'program', 'border-transparent text-gray-500 hover:text-gray-700': activeTab !== 'program'}"
                        class="flex-1 font-medium px-4 py-3 border-b-2 focus:outline-none transition-colors duration-300">
                    Program Terbaru
                </button>
            </div>

            {{-- Konten Tab --}}
            <div class="p-6">
                {{-- Panel Berita --}}
                <div x-show="activeTab === 'berita'" class="space-y-4">
                    @forelse($latestBerita as $berita)
                    <div class="border-b pb-2 last:border-b-0">
                        <a href="{{ route('admin.berita.show', $berita->id) }}" class="font-medium text-blue-600 hover:underline">{{ Str::limit($berita->judul, 40) }}</a>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500 leading-5">{{ $berita->created_at->format('d M Y') }}</p>
                            <span class="text-xs @if($berita->status == 'published') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif px-2.5 py-0.5 rounded-full leading-5 h-5 flex items-center">
                                {{ ucfirst($berita->status) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-10">Belum ada berita</p>
                    @endforelse
                </div>

                {{-- Panel Program --}}
                <div x-show="activeTab === 'program'" class="space-y-4" style="display: none;">
                    @forelse($latestPrograms as $program)
                    <div class="border-b pb-2 last:border-b-0">
                        {{-- Ganti 'nama' jika nama field di tabel program Anda berbeda --}}
                        <a href="{{ route('admin.programs.show', $program->id) }}" class="font-medium text-blue-600 hover:underline">{{ Str::limit($program->judul, 40) }}</a>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-xs text-gray-500 leading-5">{{ $program->created_at->format('d M Y') }}</p>
                            {{-- Ganti status jika ada, atau hapus span jika tidak ada --}}
                            <span class="text-xs px-2.5 py-0.5 rounded-full capitalize leading-5 h-5 flex items-center
                                @if($program->status == 'published') 
                                    bg-green-100 text-green-800 
                                @elseif($program->status == 'scheduled')
                                    bg-yellow-100 text-yellow-800
                                @else 
                                    bg-gray-100 text-gray-800 
                                @endif">
                                {{ $program->status }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-10">Belum ada program</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chartPopulasiUsia').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Anak (0-14)', 'Produktif (15-64)', 'Lansia (65+)'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: @json([
                        $statistik->usia_anak ?? 0,
                        $statistik->usia_produktif ?? 0,
                        $statistik->usia_lansia ?? 0
                    ]),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
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
    });
</script>
@endsection