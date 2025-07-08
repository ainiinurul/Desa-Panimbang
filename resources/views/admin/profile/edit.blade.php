@extends('layouts.admin')

@section('title', 'Edit Profil')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header Halaman --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight">
            Edit Profil
        </h2>
        <p class="text-gray-500 mt-1">
            Perbarui informasi profil Anda di bawah ini.
        </p>
    </div>

    {{-- Form Edit --}}
    {{-- Kita akan membuat rute 'admin.profile.update' di langkah selanjutnya --}}
    <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8 space-y-6">
                <div>
                    <h4 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-6">
                        Informasi Akun
                    </h4>
                </div>

                {{-- Input Nama Lengkap --}}
                <div>
                    <label for="name" class="block text-md font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" 
                           class="mt-2 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('name', $admin->name) }}" required>
                </div>

                {{-- Input Email --}}
                <div>
                    <label for="email" class="block text-md font-medium text-gray-700">Alamat Email</label>
                    <input type="email" name="email" id="email" 
                           class="mt-2 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('email', $admin->email) }}" required>
                </div>

                {{-- Anda bisa menambahkan input untuk password di sini nantinya --}}

            </div>
            <div class="bg-gray-50 px-8 py-4 flex justify-end items-center space-x-4">
                <a href="{{ route('admin.profile.show') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection