@extends('layouts.admin')

@section('title', 'Berita')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i>Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Judul</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($berita as $item)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $item->judul }}</td>
                    <td class="py-3 px-4">{{ $item->kategori }}</td>
                    <td class="py-3 px-4">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : 'Tanggal tidak tersedia' }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $item->status == 'published' ? 'bg-green-100 text-green-800' : 
                               ($item->status == 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="py-3 px-4 flex space-x-2">
                        <a href="{{ route('admin.berita.show', $item) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.berita.edit', $item) }}" class="text-yellow-500 hover:text-yellow-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $berita->links() }}
    </div>
</div>
@endsection