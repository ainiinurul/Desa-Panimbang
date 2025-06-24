@extends('layouts.admin')
@section('title', 'Pengaturan Website')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Pengaturan Konten Website</h2>
        <div class="text-sm text-gray-500">
            <i class="fas fa-cog mr-2"></i>Konfigurasi Website
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            @foreach($settings as $setting)
                <div class="border-b border-gray-200 pb-6 last:border-b-0">
                    <label for="{{ $setting->key }}" class="block text-gray-700 text-sm font-semibold mb-3 capitalize">
                        {{ str_replace('_', ' ', $setting->key) }}:
                    </label>

                    @if($setting->type == 'text')
                        <input type="text" 
                               name="{{ $setting->key }}" 
                               id="{{ $setting->key }}" 
                               value="{{ old($setting->key, $setting->value) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                    @elseif($setting->type == 'textarea')
                        <textarea name="{{ $setting->key }}" 
                                  id="{{ $setting->key }}" 
                                  rows="5" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-vertical">{{ old($setting->key, $setting->value) }}</textarea>

                    @elseif($setting->type == 'image')
                        <div class="space-y-3">
                            <input type="file" 
                                   name="{{ $setting->key }}" 
                                   id="{{ $setting->key }}" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            
                            @if($setting->value)
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $setting->value) }}" 
                                         alt="Current {{ str_replace('_', ' ', $setting->key) }}" 
                                         class="h-32 w-auto rounded-lg border border-gray-200 shadow-sm">
                                </div>
                            @endif
                        </div>
                    @endif

                    @error($setting->key)
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-end space-x-3">
                <button type="reset" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i class="fas fa-undo mr-2"></i>Reset
                </button>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-save mr-2"></i>Simpan Pengaturan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection