@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    {{-- Header Halaman --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight">
            Profil Saya
        </h2>
        <p class="text-gray-500 mt-1">
            Lihat dan kelola informasi profil Anda di sini.
        </p>
    </div>

    {{-- Kartu Profil Utama --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                {{-- Kolom Kiri: Foto dan Info Singkat --}}
                <div class="md:col-span-1 flex flex-col items-center text-center border-r border-gray-200 pr-8">
                    <img class="w-32 h-32 rounded-full border-4 border-blue-500 object-cover" 
                         src="https://ui-avatars.com/api/?name={{ urlencode($admin->name) }}&background=4A90E2&color=fff&size=128" 
                         alt="Foto Profil {{ $admin->name }}">
                    
                    <h3 class="mt-4 text-2xl font-bold text-gray-900">{{ $admin->name }}</h3>
                    
                    <p class="text-md text-gray-600 capitalize mt-1">{{ $admin->role }}</p>
                    
                    <a href="{{ route('admin.profile.edit') }}" class="mt-6 w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Edit Profil
                    </a>
                </div>

                {{-- Kolom Kanan: Informasi Detail --}}
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">
                            Detail Informasi Akun
                        </h4>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center">
                        <label class="text-md font-medium text-gray-500">Nama Lengkap</label>
                        <p class="col-span-2 mt-1 sm:mt-0 text-md text-gray-900">{{ $admin->name }}</p>
                    </div>
                    
                    <hr class="border-gray-200">

                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center">
                        <label class="text-md font-medium text-gray-500">Alamat Email</label>
                        <p class="col-span-2 mt-1 sm:mt-0 text-md text-gray-900">{{ $admin->email }}</p>
                    </div>

                    <hr class="border-gray-200">

                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center">
                        <label class="text-md font-medium text-gray-500">Jabatan</label>
                        <p class="col-span-2 mt-1 sm:mt-0 text-md text-gray-900 capitalize">{{ $admin->role }}</p>
                    </div>

                    <hr class="border-gray-200">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center">
                        <label class="text-md font-medium text-gray-500">Tanggal Bergabung</label>
                        <p class="col-span-2 mt-1 sm:mt-0 text-md text-gray-900">
                            {{-- Format tanggal agar lebih mudah dibaca --}}
                            {{ $admin->created_at->translatedFormat('d F Y') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection