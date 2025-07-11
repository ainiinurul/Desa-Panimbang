@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Detail Berita</h2>
        <div>
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg mr-2">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Edit Berita
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Kolom Gambar --}}
        <div class="md:col-span-1">
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto object-cover rounded-lg shadow-md">
            @else
                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
            @endif
        </div>

        {{-- Kolom Detail --}}
        <div class="md:col-span-2">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ $berita->judul }}</h3>

            <table class="w-full text-left">
                <tbody>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500 w-1/3">Kategori</td>
                        <td class="py-3 text-gray-800">
                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                {{ $berita->kategori }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500">Tanggal Publikasi</td>
                        <td class="py-3 text-gray-800">{{ \Carbon\Carbon::parse($berita->published_at ?? $berita->created_at)->isoFormat('dddd, D MMMM Y') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500">Status</td>
                        <td class="py-3 text-gray-800">
                            <span class="px-3 py-1 text-sm rounded-full 
                                {{ $berita->status == 'published' ? 'bg-green-100 text-green-800' : 
                                   ($berita->status == 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($berita->status) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6">
                <h4 class="font-medium text-gray-500 mb-2">Isi Berita</h4>
                <div class="prose max-w-none text-gray-700 p-4 bg-gray-50 rounded-lg">
                    {!! $berita->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection