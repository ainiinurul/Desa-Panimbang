@extends('layouts.admin')

@section('title', 'Tambah Program Desa')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.programs.index') }}" 
                       class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                        <i class="fas fa-arrow-left text-gray-600"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Tambah Program Desa</h1>
                        <p class="text-sm text-gray-500 mt-1">Buat program desa baru untuk masyarakat</p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center space-x-2">
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <i class="fas fa-plus-circle"></i>
                        <span>Form Tambah Program</span>
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
        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-8">
                {{-- Informasi Dasar --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                            Informasi Dasar
                        </h2>
                    </div>
                    <div class="p-6 space-y-6">
                        {{-- Judul Program --}}
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Program
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   value="{{ old('judul') }}" 
                                   placeholder="Masukkan judul program..."
                                   required>
                        </div>

                        {{-- Kategori dan Periode --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="kategori" id="kategori" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item }}" {{ old('kategori') == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">
                                    Periode
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="periode" id="periode" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       value="{{ old('periode') }}" 
                                       placeholder="Contoh: 2024-2025" 
                                       required>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="10" 
                                      class="tinymce-editor w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                      placeholder="Jelaskan detail program desa..."
                                      required>{{ old('deskripsi') }}</textarea>
                        </div>

                        {{-- Link --}}
                        <div>
                            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                                Link Terkait
                                <span class="text-gray-400 text-xs">(Opsional)</span>
                            </label>
                            <input type="url" name="link" id="link" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   value="{{ old('link') }}" 
                                   placeholder="https://example.com">
                            <p class="text-xs text-gray-500 mt-1">Link terkait program (jika ada)</p>
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
                                Gambar Program
                            </label>
                            
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
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                        📝 Draft
                                    </option>
                                    <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>
                                        ✅ Published
                                    </option>
                                    <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>
                                        ⏰ Scheduled
                                    </option>
                                </select>
                            </div>

                            <div id="published_at_container" class="{{ old('status') == 'scheduled' ? '' : 'hidden' }}">
                                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jadwal Publikasi
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="datetime-local" name="published_at" id="published_at" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       value="{{ old('published_at') }}">
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
                            <a href="{{ route('admin.programs.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 font-medium">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Program
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/s34kxbmrwl21bvruxzffhbsldltsq5kxpjxzpigtqy2m9m0h/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize TinyMCE
    tinymce.init({
        selector: '.tinymce-editor',
        height: 400,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
        ],
        toolbar: 'undo redo | blocks | ' +
                 'bold italic underline strikethrough | forecolor backcolor | ' +
                 'alignleft aligncenter alignright alignjustify | ' +
                 'bullist numlist outdent indent | ' +
                 'removeformat | link image media table | ' +
                 'emoticons charmap | preview code fullscreen help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif; font-size: 14px; line-height: 1.6; }',
        
        // Konfigurasi untuk bahasa Indonesia
        language: 'id',
        
        // Pengaturan gambar
        image_advtab: true,
        image_uploadtab: true,
        
        // Pengaturan untuk responsive
        mobile: {
            theme: 'mobile',
            plugins: ['autosave', 'lists', 'autolink'],
            toolbar: ['undo', 'bold', 'italic', 'styleselect']
        },
        
        // Custom style formats
        style_formats: [
            {title: 'Heading 1', block: 'h1'},
            {title: 'Heading 2', block: 'h2'},
            {title: 'Heading 3', block: 'h3'},
            {title: 'Heading 4', block: 'h4'},
            {title: 'Heading 5', block: 'h5'},
            {title: 'Heading 6', block: 'h6'},
            {title: 'Paragraph', block: 'p'},
            {title: 'Blockquote', block: 'blockquote'},
            {title: 'Div', block: 'div'},
            {title: 'Pre', block: 'pre'},
            {title: 'Code', inline: 'code'}
        ],
        
        // Pengaturan paste
        paste_data_images: true,
        paste_as_text: false,
        paste_word_valid_elements: "b,strong,i,em,h1,h2,h3,h4,h5,h6,p,ol,ul,li,a[href],span,div,br",
        
        // Validasi HTML
        valid_elements: '*[*]',
        extended_valid_elements: '*[*]',
        
        // Setup function untuk kustomisasi lebih lanjut
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });

    // Status select functionality
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
        // Trigger TinyMCE to save content to textarea
        tinymce.triggerSave();
        
        const submitBtn = document.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        submitBtn.disabled = true;
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