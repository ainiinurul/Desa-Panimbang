
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manajemen Berita</h1>
    <a href="{{ route('news.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Berita</a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">Judul</th>
                <th class="border border-gray-300 p-2">Penulis</th>
                <th class="border border-gray-300 p-2">Tanggal</th>
                <th class="border border-gray-300 p-2">Kategori</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $item->title }}</td>
                    <td class="border border-gray-300 p-2">{{ $item->author }}</td>
                    <td class="border border-gray-300 p-2">{{ $item->date }}</td>
                    <td class="border border-gray-300 p-2">{{ $item->category }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('news.edit', $item->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
