@extends('layouts.admin')

@section('title', 'Program Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Program Desa</h2>
        <a href="{{ route('admin.programs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i>Tambah Program
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
                    <th class="py-3 px-4 text-left">Gambar</th>
                    <th class="py-3 px-4 text-left">Judul</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-left">Periode</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $program)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">
                        @if($program->gambar)
                            <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-3 px-4">{{ $program->judul }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                            {{ $program->kategori }}
                        </span>
                    </td>
                    <td class="py-3 px-4">{{ $program->periode }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $program->status == 'published' ? 'bg-green-100 text-green-800' : 
                               ($program->status == 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $program->status }}
                        </span>
                    </td>
                    <td class="py-3 px-4 flex space-x-2">
                        <a href="{{ route('admin.programs.show', $program) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.programs.edit', $program) }}" class="text-yellow-500 hover:text-yellow-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 px-4 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-4 block"></i>
                        Belum ada data program desa.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($programs) && method_exists($programs, 'links'))
    <div class="mt-4">
        {{ $programs->links() }}
    </div>
    @endif
</div>
@endsection