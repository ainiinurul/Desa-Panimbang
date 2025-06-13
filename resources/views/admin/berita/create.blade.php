@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Tambah Berita Baru</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="judul" class="block mb-2 font-medium">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="w-full p-2 border rounded-lg" value="{{ old('judul') }}" required>
            </div>

            <div>
                <label for="tanggal" class="block mb-2 font-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="w-full p-2 border rounded-lg" value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
            </div>

            <div>
                <label for="kategori" class="block mb-2 font-medium">Kategori</label>
                <select name="kategori" id="kategori" class="w-full p-2 border rounded-lg" required>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="gambar" class="block mb-2 font-medium">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="status" class="block mb-2 font-medium">Status</label>
                <select name="status" id="status" class="w-full p-2 border rounded-lg" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            <div id="published_at_container" class="{{ old('status') == 'scheduled' ? '' : 'hidden' }}">
                <label for="published_at" class="block mb-2 font-medium">Jadwalkan Publikasi</label>
                <input type="datetime-local" name="published_at" id="published_at" class="w-full p-2 border rounded-lg" value="{{ old('published_at') }}">
            </div>

            <div class="col-span-2">
                <label for="deskripsi" class="block mb-2 font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="w-full p-2 border rounded-lg" required>{{ old('deskripsi') }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Simpan Berita
            </button>
        </div>
    </form>
</div>

<script>
    // Tampilkan field published_at jika status dipilih 'scheduled'
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