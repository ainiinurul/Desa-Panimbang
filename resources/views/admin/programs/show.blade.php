@extends('layouts.admin')

@section('title', 'Detail Program: ' . $program->judul)

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Detail Program</h2>
        <div>
            <a href="{{ route('admin.programs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg mr-2">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <a href="{{ route('admin.programs.edit', $program) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>Edit Program
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Kolom Gambar --}}
        <div class="md:col-span-1">
            @if($program->gambar)
                <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-full h-auto object-cover rounded-lg shadow-md">
            @else
                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
            @endif
        </div>

        {{-- Kolom Detail --}}
        <div class="md:col-span-2">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ $program->judul }}</h3>

            <table class="w-full text-left">
                <tbody>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500 w-1/3">Kategori</td>
                        <td class="py-3 text-gray-800">
                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                {{ $program->kategori }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500">Periode</td>
                        <td class="py-3 text-gray-800">{{ $program->periode }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500">Status</td>
                        <td class="py-3 text-gray-800">
                            <span class="px-3 py-1 text-sm rounded-full 
                                {{ $program->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($program->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 font-medium text-gray-500">Link Terkait</td>
                        <td class="py-3 text-blue-600 hover:underline">
                            <a href="{{ $program->link ?: '#' }}" target="_blank">{{ $program->link ?: 'Tidak ada' }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6">
                <h4 class="font-medium text-gray-500 mb-2">Deskripsi Program</h4>
                <div class="prose max-w-none text-gray-700 p-4 bg-gray-50 rounded-lg">
                    {!! $program->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection