@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Pengguna Baru</h2>
    
    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-medium mb-2">Peran</label>
            <select name="role" id="role" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('role') border-red-500 @enderror">
                <option value="">Pilih Peran</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Kata Sandi</label>
            <input type="password" name="password" id="password" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.user.index') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Tambah Pengguna
            </button>
        </div>
    </form>
</div>
@endsection