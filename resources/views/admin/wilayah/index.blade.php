@extends('layouts.admin')

@section('title', 'Manajemen Wilayah Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Konten Halaman Wilayah</h2>
            <p class="text-gray-600 mt-1">Kelola data statistik dan deskripsi geografis desa.</p>
        </div>
        <div class="text-sm text-gray-500 flex items-center">
            <i class="fas fa-map-marked-alt mr-2"></i>Konten Wilayah
        </div>
    </div>

    {{-- Menampilkan notifikasi sukses --}}
    @if (session('success'))
    <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    {{-- Menampilkan notifikasi error --}}
    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <span class="font-medium">Terdapat kesalahan:</span>
        </div>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.wilayah.update') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Bagian Statistik --}}
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <div class="flex items-center mb-4">
                <i class="fas fa-chart-area text-blue-500 mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Data Statistik Wilayah (dalam Hektare)</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <label for="total_wilayah" class="block text-gray-700 text-sm font-medium mb-2">Total Wilayah</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="total_wilayah" name="total_wilayah" value="{{ old('total_wilayah', $wilayah->total_wilayah) }}">
                </div>
                <div>
                    <label for="daratan" class="block text-gray-700 text-sm font-medium mb-2">Daratan</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="daratan" name="daratan" value="{{ old('daratan', $wilayah->daratan) }}">
                </div>
                <div>
                    <label for="sawah" class="block text-gray-700 text-sm font-medium mb-2">Sawah</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="sawah" name="sawah" value="{{ old('sawah', $wilayah->sawah) }}">
                </div>
                <div>
                    <label for="tanah_kas_desa" class="block text-gray-700 text-sm font-medium mb-2">Tanah Kas Desa</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="tanah_kas_desa" name="tanah_kas_desa" value="{{ old('tanah_kas_desa', $wilayah->tanah_kas_desa) }}">
                </div>
                <div>
                    <label for="telaga" class="block text-gray-700 text-sm font-medium mb-2">Telaga</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="telaga" name="telaga" value="{{ old('telaga', $wilayah->telaga) }}">
                </div>
                <div>
                    <label for="lain_lain" class="block text-gray-700 text-sm font-medium mb-2">Lain-lain</label>
                    <input type="number" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="lain_lain" name="lain_lain" value="{{ old('lain_lain', $wilayah->lain_lain) }}">
                </div>
            </div>
        </div>

        {{-- Bagian Deskripsi --}}
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <div class="flex items-center mb-6">
                <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Deskripsi Wilayah</h3>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="geografis_deskripsi" class="block text-gray-700 text-sm font-medium mb-2">Geografis/Topografi dan Jenis Tanah</label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="geografis_deskripsi" name="geografis_deskripsi" rows="8">{{ old('geografis_deskripsi', $wilayah->geografis_deskripsi) }}</textarea>
                </div>
                <div>
                    <label for="iklim_deskripsi" class="block text-gray-700 text-sm font-medium mb-2">Iklim</label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg" id="iklim_deskripsi" name="iklim_deskripsi" rows="6">{{ old('iklim_deskripsi', $wilayah->iklim_deskripsi) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logika untuk menghilangkan alert setelah 5 detik
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s ease-out';
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 500);
        }, 5000);
    }
});
</script>
@endsection