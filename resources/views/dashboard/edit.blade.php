
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="title" name="title" value="{{ $news->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="author" name="author" value="{{ $news->author }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" id="date" name="date" value="{{ $news->date }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="Kesehatan" {{ $news->category == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="Pembangunan" {{ $news->category == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                <option value="Ekonomi" {{ $news->category == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                <option value="Pendidikan" {{ $news->category == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                <option value="Keamanan" {{ $news->category == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                <option value="Kegiatan" {{ $news->category == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $news->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <img src="{{ asset('storage/images/' . $news->image) }}" alt="Current Image" class="mt-2 w-32 h-32 object-cover">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
