@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.berita.index') }}" 
                       class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                        <i class="fas fa-arrow-left text-gray-600"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Edit Berita Desa</h1>
                        <p class="text-sm text-gray-500 mt-1">Perbarui informasi berita desa</p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center space-x-2">
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <i class="fas fa-clock"></i>
                        <span>Terakhir diubah: {{ $berita->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alert Error --}}
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-8 rounded-r-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
                    <ul class="mt-2 text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-start">
                                <span class="inline-block w-1 h-1 bg-red-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Form Section --}}
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Informasi Dasar --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-newspaper text-blue-500 mr-2"></i>
                            Informasi Dasar
                        </h2>
                    </div>
                    <div class="p-6 space-y-6">
                        {{-- Judul Berita --}}
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   value="{{ old('judul', $berita->judul) }}" 
                                   placeholder="Masukkan judul berita..."
                                   required>
                        </div>

                        {{-- Tanggal dan Kategori --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Berita
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="tanggal" id="tanggal" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       value="{{ old('tanggal', $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d') : '') }}" 
                                       required>
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="kategori" id="kategori" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                        required>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat }}" {{ old('kategori', $berita->kategori) == $kat ? 'selected' : '' }}>
                                            {{ $kat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Berita
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="6" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                      placeholder="Tulis konten berita di sini..."
                                      required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Media dan Publikasi --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-green-50 to-emerald-50 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-image text-green-500 mr-2"></i>
                            Media & Publikasi
                        </h2>
                    </div>
                    <div class="p-6 space-y-6">
                        {{-- Gambar --}}
                        <div>
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                                Gambar Berita
                            </label>
                            
                            @if($berita->gambar)
                                <div class="mb-4 relative group">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                         alt="Gambar Berita" 
                                         class="w-full h-48 object-cover rounded-lg shadow-sm">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded-lg flex items-center justify-center">
                                        <p class="text-white text-sm font-medium">Unggah gambar baru untuk mengganti</p>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors duration-200">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                <input type="file" name="gambar" id="gambar" class="hidden" accept="image/*">
                                <label for="gambar" class="cursor-pointer">
                                    <span class="text-blue-600 hover:text-blue-800 font-medium">Pilih gambar</span>
                                    <span class="text-gray-500"> atau drag & drop</span>
                                </label>
                                <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG. Maksimal 2MB</p>
                            </div>
                        </div>

                        {{-- Status dan Jadwal --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status Publikasi
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                        required>
                                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>
                                        📝 Draft
                                    </option>
                                    <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>
                                        ✅ Published
                                    </option>
                                    <option value="scheduled" {{ old('status', $berita->status) == 'scheduled' ? 'selected' : '' }}>
                                        ⏰ Scheduled
                                    </option>
                                </select>
                            </div>

                            <div id="published_at_container" class="{{ old('status', $berita->status) == 'scheduled' ? '' : 'hidden' }}">
                                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jadwal Publikasi
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="datetime-local" name="published_at" id="published_at" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       value="{{ old('published_at', $berita->published_at ? \Carbon\Carbon::parse($berita->published_at)->format('Y-m-d\TH:i') : '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                            <i class="fas fa-info-circle"></i>
                            <span>Pastikan semua informasi sudah benar sebelum menyimpan</span>
                        </div>
                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                            <a href="{{ route('admin.berita.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 font-medium">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl">
                                <i class="fas fa-save mr-2"></i>
                                Update Berita
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const publishedAtContainer = document.getElementById('published_at_container');
        
        statusSelect.addEventListener('change', function() {
            if (this.value === 'scheduled') {
                publishedAtContainer.classList.remove('hidden');
                publishedAtContainer.classList.add('animate-fadeIn');
            } else {
                publishedAtContainer.classList.add('hidden');
                publishedAtContainer.classList.remove('animate-fadeIn');
            }
        });

        // Set initial state
        if (statusSelect.value === 'scheduled') {
            publishedAtContainer.classList.remove('hidden');
        }

        // File input enhancement
        const fileInput = document.getElementById('gambar');
        const fileLabel = document.querySelector('label[for="gambar"]');
        
        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                fileLabel.innerHTML = `<span class="text-green-600 font-medium">✓ ${fileName}</span>`;
            }
        });

        // Form validation enhancement
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            submitBtn.disabled = true;
        });

        // Auto-resize textarea
        const textarea = document.getElementById('deskripsi');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
</script>

<style>
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Custom scrollbar */
    textarea::-webkit-scrollbar {
        width: 8px;
    }
    
    textarea::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    textarea::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }
    
    textarea::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
@endsection