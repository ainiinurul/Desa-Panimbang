
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Berita</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="author" name="author" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Pembangunan">Pembangunan</option>
                <option value="Ekonomi">Ekonomi</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Kegiatan">Kegiatan</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
