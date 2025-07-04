@extends('layouts.admin')

@section('title', 'Manajemen Sejarah Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Konten Sejarah Desa</h2>
            <p class="text-gray-600 mt-1">Kelola dan edit informasi sejarah desa Anda</p>
        </div>
        <div class="text-sm text-gray-500 flex items-center">
            <i class="fas fa-history mr-2"></i>Konten Sejarah
        </div>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
    <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    {{-- Error Alert --}}
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

    <form action="{{ route('admin.sejarah.update') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Header Section --}}
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <div class="flex items-center mb-4">
                <i class="fas fa-heading text-blue-500 mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Header Halaman</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="judul_utama" class="block text-gray-700 text-sm font-medium mb-2">
                        Judul Utama
                    </label>
                    <input type="text" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                           id="judul_utama" 
                           name="judul_utama" 
                           value="{{ old('judul_utama', $sejarah->judul_utama) }}"
                           placeholder="Masukkan judul utama halaman">
                </div>
                
                <div>
                    <label for="sub_judul" class="block text-gray-700 text-sm font-medium mb-2">
                        Sub Judul
                    </label>
                    <input type="text" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                           id="sub_judul" 
                           name="sub_judul" 
                           value="{{ old('sub_judul', $sejarah->sub_judul) }}"
                           placeholder="Masukkan sub judul">
                </div>
            </div>
        </div>

        {{-- Main Content Section --}}
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <div class="flex items-center mb-6">
                <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                <h3 class="text-lg font-semibold text-gray-800">Konten Utama</h3>
            </div>

            <div class="space-y-6">
                {{-- Paragraf 1 --}}
                <div>
                    <label for="paragraf_1" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-paragraph mr-1"></i>Paragraf 1 (Awal Mula)
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical" 
                              id="paragraf_1" 
                              name="paragraf_1" 
                              rows="4"
                              placeholder="Ceritakan tentang awal mula desa...">{{ old('paragraf_1', $sejarah->paragraf_1) }}</textarea>
                </div>

                {{-- Paragraf 2 --}}
                <div>
                    <label for="paragraf_2" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-paragraph mr-1"></i>Paragraf 2 (Asal Usul Nama)
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical" 
                              id="paragraf_2" 
                              name="paragraf_2" 
                              rows="3"
                              placeholder="Jelaskan asal usul nama desa...">{{ old('paragraf_2', $sejarah->paragraf_2) }}</textarea>
                </div>

                {{-- Silsilah Kepala Desa --}}
                <div>
                    <label for="silsilah_kepala_desa" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-users mr-1"></i>Silsilah Kepala Desa
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical font-mono text-sm" 
                              id="silsilah_kepala_desa" 
                              name="silsilah_kepala_desa" 
                              rows="12"
                              placeholder="Masukkan satu nama per baris&#10;Contoh:&#10;1. Nama Kepala Desa Pertama&#10;2. Nama Kepala Desa Kedua">{{ old('silsilah_kepala_desa', $sejarah->silsilah_kepala_desa) }}</textarea>
                    <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-xs text-blue-700 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Tips:</strong> Tulis satu nama per baris. Anda bisa menyalin daftar dari halaman sejarah dan mengeditnya di sini.
                        </p>
                    </div>
                </div>

                {{-- Dusun Sebelum Pemekaran --}}
                <div>
                    <label for="sebelum_pemekaran" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-map-marked-alt mr-1"></i>Dusun Sebelum Pemekaran
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical font-mono text-sm" 
                              id="sebelum_pemekaran" 
                              name="sebelum_pemekaran" 
                              rows="7"
                              placeholder="Masukkan satu nama dusun per baris&#10;Contoh:&#10;Dusun A&#10;Dusun B">{{ old('sebelum_pemekaran', $sejarah->sebelum_pemekaran) }}</textarea>
                </div>

                {{-- Setelah Pemekaran --}}
                <div>
                    <label for="setelah_pemekaran" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-expand-arrows-alt mr-1"></i>Penjelasan Setelah Pemekaran
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical" 
                              id="setelah_pemekaran" 
                              name="setelah_pemekaran" 
                              rows="4"
                              placeholder="Jelaskan kondisi desa setelah pemekaran...">{{ old('setelah_pemekaran', $sejarah->setelah_pemekaran) }}</textarea>
                </div>

                {{-- Sejarah Kantor Desa --}}
                <div>
                    <label for="sejarah_kantor_desa" class="block text-gray-700 text-sm font-medium mb-2">
                        <i class="fas fa-building mr-1"></i>Sejarah Perpindahan Kantor Desa
                    </label>
                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-vertical" 
                              id="sejarah_kantor_desa" 
                              name="sejarah_kantor_desa" 
                              rows="5"
                              placeholder="Ceritakan sejarah perpindahan kantor desa...">{{ old('sejarah_kantor_desa', $sejarah->sejarah_kantor_desa) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
            <button type="reset" 
                    class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 flex items-center">
                <i class="fas fa-undo mr-2"></i>Reset Form
            </button>
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 flex items-center shadow-lg">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- Additional Styling for Better UX --}}
<style>
    /* Custom scrollbar for textareas */
    textarea::-webkit-scrollbar {
        width: 6px;
    }
    
    textarea::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    textarea::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    textarea::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }

    /* Loading animation for submit button */
    .btn-loading {
        position: relative;
    }
    
    .btn-loading:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>

{{-- JavaScript for enhanced UX --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // KODE LAMA ANDA (Biarkan saja)
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });

    const submitBtn = document.querySelector('button[type="submit"]');
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function() {
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        submitBtn.disabled = true;
        submitBtn.classList.add('btn-loading');
    });

    // ======================================================
    // KODE BARU UNTUK MENGHILANGKAN ALERT (Tambahkan ini)
    // ======================================================
    const successAlert = document.getElementById('success-alert');
    
    // Periksa apakah elemen alert ada di halaman
    if (successAlert) {
        // Atur waktu tunggu selama 5 detik (5000 milidetik)
        setTimeout(() => {
            // Tambahkan transisi agar hilangnya smooth
            successAlert.style.transition = 'opacity 0.5s ease-out';
            successAlert.style.opacity = '0';
            
            // Setelah transisi selesai, sembunyikan elemen sepenuhnya
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 500); // 500ms cocok dengan durasi transisi

        }, 5000); // 5 detik
    }
});
</script>
@endsection