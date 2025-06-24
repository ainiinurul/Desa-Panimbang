@extends('layouts.admin')

@section('title', 'Edit Program Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Edit Program Desa</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="judul" class="block mb-2 font-medium">Judul Program</label>
                <input type="text" name="judul" id="judul" class="w-full p-2 border rounded-lg" 
                    value="{{ old('judul', $program->judul) }}" required>
            </div>

            <div>
                <label for="kategori" class="block mb-2 font-medium">Kategori</label>
                <select name="kategori" id="kategori" class="w-full p-2 border rounded-lg" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item }}" {{ old('kategori', $program->kategori) == $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="periode" class="block mb-2 font-medium">Periode</label>
                <input type="text" name="periode" id="periode" class="w-full p-2 border rounded-lg" 
                    value="{{ old('periode', $program->periode) }}" placeholder="Contoh: 2024-2025" required>
            </div>

            <div>
                <label for="status" class="block mb-2 font-medium">Status</label>
                <select name="status" id="status" class="w-full p-2 border rounded-lg" required>
                    <option value="draft" {{ old('status', $program->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $program->status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ old('status', $program->status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            <div>
                <label for="gambar" class="block mb-2 font-medium">Gambar</label>
                @if($program->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $program->gambar) }}" alt="Gambar Program" 
                            class="w-full h-40 object-cover mb-2 rounded-lg">
                        <p class="text-sm text-gray-500">Unggah gambar baru untuk mengganti</p>
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" class="w-full p-2 border rounded-lg" accept="image/*">
                <small class="text-gray-500">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
            </div>

            <div id="published_at_container" class="{{ old('status', $program->status) == 'scheduled' ? '' : 'hidden' }}">
                <label for="published_at" class="block mb-2 font-medium">Jadwalkan Publikasi</label>
                <input type="datetime-local" name="published_at" id="published_at" class="w-full p-2 border rounded-lg" 
                       value="{{ old('published_at', $program->published_at ? \Carbon\Carbon::parse($program->published_at)->format('Y-m-d\TH:i') : '') }}">
            </div>

            <div class="col-span-2">
                <label for="link" class="block mb-2 font-medium">Link (Opsional)</label>
                <input type="url" name="link" id="link" class="w-full p-2 border rounded-lg" 
                    value="{{ old('link', $program->link) }}" placeholder="https://example.com">
                <small class="text-gray-500">Link terkait program (jika ada)</small>
            </div>

            <div class="col-span-2">
                <label for="deskripsi" class="block mb-2 font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full p-2 border rounded-lg" required placeholder="Jelaskan detail program desa...">{{ old('deskripsi', $program->deskripsi) }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.programs.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Update Program
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const publishedAtContainer = document.getElementById('published_at_container');
        
        statusSelect.addEventListener('change', function() {
            if (this.value === 'scheduled') {
                publishedAtContainer.classList.remove('hidden');
            } else {
                publishedAtContainer.classList.add('hidden');
            }
        });

        // Set initial state
        if (statusSelect.value === 'scheduled') {
            publishedAtContainer.classList.remove('hidden');
        }
    });
</script>
@endsection