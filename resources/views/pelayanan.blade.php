<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Online - Desa Panimbang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased text-gray-800">

{{-- LETAKKAN KODE NOTIFIKASI BARU DI SINI --}}
@if (session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => { show = false }, 5000)"
        x-show="show"
        x-transition
        class="fixed top-24 right-5 bg-green-600 text-white py-3 px-6 rounded-lg shadow-lg z-50 flex items-center"
        style="display: none;"
    >
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="ml-4 text-xl font-semibold hover:text-gray-200">&times;</button>
    </div>
@endif
{{-- SAMPAI SINI --}}

<x-navbar></x-navbar>

    <header class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4 transform transition-all duration-500 translate-y-0 opacity-100">Pelayanan Online</h1>
            <p class="text-lg max-w-2xl mx-auto transform transition-all duration-700 delay-100 translate-y-0 opacity-100">
                Kami menyediakan layanan online untuk mempermudah masyarakat dalam mengajukan permohonan surat dan dokumen penting lainnya.
            </p>
        </div>
    </header>

    {{-- Form Permohonan Online --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-xl">
                <div class="p-6 bg-blue-700 text-white">
                    <h2 class="text-2xl font-bold">Form Permohonan Online</h2>
                    <p class="mt-2">Silakan isi formulir di bawah ini untuk mengajukan permohonan</p>
                </div>

                {{-- Ganti seluruh blok form Anda dengan kode ini --}}
                <form method="POST" action="{{ route('pelayanan.store') }}" class="p-6 space-y-6" x-data="{ 
                    showLainnya: false,
                    nikValue: '',
                    isNikValid: false,
                    nikError: '',
                    
                    validateNik() {
                        // Hanya izinkan angka
                        this.nikValue = this.nikValue.replace(/[^0-9]/g, '');
                        
                        // Cek panjang NIK
                        if (this.nikValue.length > 0 && this.nikValue.length < 16) {
                            this.nikError = 'NIK harus terdiri dari 16 digit angka.';
                            this.isNikValid = false;
                        } else if (this.nikValue.length === 16) {
                            this.nikError = ''; // Hilangkan pesan error jika sudah 16 digit
                            this.isNikValid = true;
                        } else {
                            this.nikError = '';
                            this.isNikValid = false;
                        }
                    }
                }">
                @csrf {{-- Token keamanan Laravel, wajib ada --}}
                    <div class="space-y-2">
                        <label for="nama" class="block text-md font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" placeholder="Masukkan Nama Lengkap Anda" required>
                    </div>

                    {{-- BAGIAN NIK YANG DIMODIFIKASI --}}
                    <div class="space-y-2">
                        <label for="nik" class="block text-md font-medium text-gray-700">NIK</label>
                        <input 
                            type="text" 
                            id="nik" 
                            name="nik"
                            maxlength="16"
                            x-model="nikValue"
                            @input="validateNik()"
                            :class="{ 'border-red-500 focus:ring-red-500': nikError, 'border-gray-300 focus:ring-blue-500': !nikError }"
                            class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 transition-all duration-300" 
                            placeholder="Masukkan NIK 16 digit Anda" required>
                        
                        {{-- Pesan error akan muncul di sini --}}
                        <div x-show="nikError" x-transition>
                            <p x-text="nikError" class="text-red-600 text-sm mt-1"></p>
                        </div>
                        <div class="text-right text-xs" :class="nikValue.length === 16 ? 'text-green-600' : 'text-gray-500'">
                            <span x-text="nikValue.length"></span>/16
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="telepon" class="block text-md font-medium text-gray-700">Telepon</label>
                        <input type="text" id="telepon" name="telepon" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" placeholder="Masukkan nomor telepon aktif Anda" required>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="jenis_permohonan" class="block text-md font-medium text-gray-700">Jenis Surat Permohonan</label>
                        <select id="jenis_permohonan" name="jenis_permohonan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" @change="showLainnya = ($event.target.value === 'Lainnya')" required>
                            <option value="" disabled selected>Pilih Jenis Permohonan</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Belum Menikah">Surat Keterangan Belum Menikah</option>
                            <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
                            <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                            <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                            <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan</option>
                            <option value="Surat Keterangan Janda/Duda">Surat Keterangan Janda/Duda</option>
                            <option value="Surat Keterangan Beda Identitas">Surat Keterangan Beda Identitas</option>
                            <option value="Surat Keterangan Waris">Surat Keterangan Waris</option>
                            <option value="Surat Keterangan Tanah">Surat Keterangan Tanah</option>
                            <option value="Surat Pengantar Nikah">Surat Pengantar Nikah</option>
                            <option value="Surat Pengantar Cerai">Surat Pengantar Cerai</option>
                            <option value="Surat Pengantar Pindah">Surat Pengantar Pindah</option>
                            <option value="Surat Pengantar Rujuk">Surat Pengantar Rujuk</option>
                            <option value="Surat Rekomendasi">Surat Rekomendasi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div x-show="showLainnya" class="space-y-2" x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <label for="lainnya" class="block text-md font-medium text-gray-700">Sebutkan Jenis Permohonan</label>
                        <input type="text" id="lainnya" name="lainnya" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" placeholder="Jelaskan permohonan Anda">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="keterangan" class="block text-md font-medium text-gray-700">Keterangan atau deskripsi keperluan surat</label>
                        <textarea id="keterangan" name="keterangan" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" placeholder="Tambahkan keterangan jika diperlukan, misal: 'Untuk keperluan melamar pekerjaan di PT. Maju Mundur'"></textarea>
                    </div>
                    
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            :disabled="!isNikValid"
                            :class="{ 'bg-gray-400 cursor-not-allowed': !isNikValid, 'bg-blue-600 hover:bg-blue-700 hover:scale-105': isNikValid }"
                            class="w-full px-6 py-3 text-white font-medium rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 transform transition-all duration-300">
                            Ajukan Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Persyaratan Dokumen untuk Setiap Jenis Layanan --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Persyaratan Dokumen untuk Setiap Jenis Layanan</h2>

            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4" x-data="{ open: '' }">

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'skck' ? '' : 'skck'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>1. Surat Pengantar SKCK</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'skck' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'skck'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP yang masih berlaku</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Pas foto 4x6 (2 lembar) background merah</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'domisili' ? '' : 'domisili'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>2. Surat Keterangan Domisili</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'domisili' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'domisili'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW</li><li>Surat keterangan kontrak/sewa (jika mengontrak)</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'usaha' ? '' : 'usaha'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>3. Surat Keterangan Usaha</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'usaha' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'usaha'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP pemilik usaha</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW</li><li>Foto lokasi usaha</li><li>Surat keterangan domisili usaha (jika diperlukan)</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'tidak_mampu' ? '' : 'tidak_mampu'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>4. Surat Keterangan Tidak Mampu</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'tidak_mampu' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'tidak_mampu'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW</li><li>Surat keterangan penghasilan (jika ada)</li><li>Fotokopi tagihan listrik/air</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'belum_menikah' ? '' : 'belum_menikah'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>5. Surat Keterangan Belum Menikah</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'belum_menikah' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'belum_menikah'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP yang masih berlaku</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Akta Kelahiran</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'penghasilan' ? '' : 'penghasilan'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>6. Surat Keterangan Penghasilan</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'penghasilan' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'penghasilan'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW</li><li>Slip gaji/bukti penghasilan (jika karyawan)</li><li>Surat keterangan usaha (jika wiraswasta)</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'kelahiran' ? '' : 'kelahiran'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>7. Surat Keterangan Kelahiran</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'kelahiran' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'kelahiran'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP kedua orang tua</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Buku Nikah/Akta Nikah orang tua</li><li>Surat keterangan lahir dari Rumah Sakit/Bidan</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'kematian' ? '' : 'kematian'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>8. Surat Keterangan Kematian</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'kematian' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'kematian'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP almarhum</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat keterangan kematian dari Rumah Sakit/dokter</li><li>Fotokopi KTP pelapor (ahli waris)</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'kehilangan' ? '' : 'kehilangan'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>9. Surat Keterangan Kehilangan</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'kehilangan' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'kehilangan'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW</li><li>Surat laporan kehilangan dari Polsek (jika diperlukan)</li><li>Mengisi formulir permohonan dengan detail barang yang hilang</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'janda_duda' ? '' : 'janda_duda'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>10. Surat Keterangan Janda/Duda</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'janda_duda' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'janda_duda'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Akta Kematian suami/istri (jika meninggal)</li><li>Fotokopi Akta Cerai (jika bercerai)</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'beda_identitas' ? '' : 'beda_identitas'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>11. Surat Keterangan Beda Identitas</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'beda_identitas' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'beda_identitas'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Akta Kelahiran</li><li>Dokumen yang menunjukkan perbedaan identitas</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'waris' ? '' : 'waris'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>12. Surat Keterangan Waris</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'waris' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'waris'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP para ahli waris</li><li>Fotokopi Kartu Keluarga (KK) almarhum</li><li>Fotokopi Akta Kematian</li><li>Fotokopi Buku Nikah/Akta Nikah (jika ada)</li><li>Fotokopi Akta Kelahiran anak-anak (jika ada)</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'tanah' ? '' : 'tanah'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>13. Surat Keterangan Tanah</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'tanah' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'tanah'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP pemilik tanah</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi sertifikat tanah/girik/letter C</li><li>Fotokopi SPPT PBB tahun terakhir</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'nikah' ? '' : 'nikah'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>14. Surat Pengantar Nikah</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'nikah' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'nikah'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP calon pengantin</li><li>Fotokopi Kartu Keluarga (KK) kedua belah pihak</li><li>Fotokopi Akta Kelahiran calon pengantin</li><li>Surat keterangan belum menikah</li><li>Pas foto 2x3 (masing-masing 2 lembar)</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'cerai' ? '' : 'cerai'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>15. Surat Pengantar Cerai</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'cerai' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'cerai'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP suami-istri</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Buku Nikah/Akta Nikah</li><li>Fotokopi Akta Kelahiran anak (jika ada)</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'pindah' ? '' : 'pindah'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>16. Surat Pengantar Pindah</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'pindah' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'pindah'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP seluruh anggota keluarga yang pindah</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Surat pengantar dari RT/RW asal</li><li>Surat keterangan akan pindah</li><li>Mengisi formulir permohonan pindah</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'rujuk' ? '' : 'rujuk'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>17. Surat Pengantar Rujuk</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'rujuk' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'rujuk'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP suami-istri</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Fotokopi Akta Cerai</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button @click="open = open === 'rekomendasi' ? '' : 'rekomendasi'" class="w-full text-left p-4 flex justify-between items-center font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>18. Surat Rekomendasi</span>
                        <svg class="h-6 w-6 transform transition-transform duration-300" :class="{ 'rotate-180': open === 'rekomendasi' }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open === 'rekomendasi'" x-transition class="p-4 bg-gray-50 border-t"><ul class="list-disc list-inside space-y-2 text-gray-700"><li>Fotokopi KTP</li><li>Fotokopi Kartu Keluarga (KK)</li><li>Dokumen pendukung sesuai kebutuhan rekomendasi</li><li>Surat pengantar dari RT/RW</li><li>Mengisi formulir permohonan</li><li>Meterai 10.000</li></ul></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lain - Lain --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Informasi Pelayanan</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 rounded-lg p-6 shadow transform transition-all duration-500 hover:-translate-y-2 hover:shadow-lg">
                    <div class="w-14 h-14 flex items-center justify-center bg-blue-600 text-white rounded-full mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Catatan Penting</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Semua fotokopi harus disertai dengan dokumen asli untuk diverifikasi.</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Pas foto menggunakan background sesuai ketentuan (biasanya merah atau biru)</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Meterai 10.000 (sesuai tarif terbaru)</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Surat pengantar RT/RW wajib untuk semua jenis surat.</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Formulir permohonan diisi lengkap dan jelas.</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Waktu penyelesaian umumnya 1-3 hari kerja.</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 shadow transform transition-all duration-500 hover:-translate-y-2 hover:shadow-lg">
                    <div class="w-14 h-14 flex items-center justify-center bg-blue-600 text-white rounded-full mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Waktu Layanan</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Senin - Jumat: 08.00 - 16.00 WIB</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Sabtu - Minggu: Tutup</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Pengambilan dokumen: Maksimal 5 hari kerja</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-6 shadow transform transition-all duration-500 hover:-translate-y-2 hover:shadow-lg">
                    <div class="w-14 h-14 flex items-center justify-center bg-blue-600 text-white rounded-full mb-4">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Informasi Tambahan</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Seluruh pelayanan bersifat gratis</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Datang pada jam operasional yang tepat.</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Status permohonan dapat dicek melalui WhatsApp</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Pengambilan dokumen harus membawa KTP asli</li>
                        <li class="flex items-start"><svg class="h-5 w-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Tanyakan kepada petugas jika ada persyaratan tambahan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                <div>
                    <div class="flex items-center mb-4">
                        <img src="images/logo_cilacap.png" alt="Logo Cilacap" class="h-14 w-auto mr-3">
                        <div>
                            <h3 class="text-lg font-bold">DESA PANIMBANG</h3>
                            <p class="text-sm">Kabupaten Cilacap, Jawa Tengah</p>
                        </div>
                    </div>
                    <p class="mb-4">Jl. Raya Panimbang No. 123, Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah 53211</p>
                    <div class="space-y-2">
                        <p class="flex items-center"><svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>desapanimbang@gmail.com</p>
                        <p class="flex items-center"><svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>(0282) 12345678</p>
                        <p class="flex items-center"><svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>0812-3456-7890</p>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Lokasi Kami</h3>
                    <div class="h-48 rounded-lg overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11355.56292625439!2d108.8696549!3d-7.36181455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f809a8f839a91%3A0x5027a76e3571600!2sPanimbang%2C%20Kec.%20Cimanggu%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1740842046892!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <p class="text-sm mt-2">Klik pada peta untuk melihat lokasi lebih detail</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 mb-6">
                        <li><a href="sejarah.html" class="hover:text-blue-300 transition-colors">Sejarah Desa</a></li>
                        <li><a href="pengaduan.html" class="hover:text-blue-300 transition-colors">Layanan Pengaduan</a></li>
                        <li><a href="pelayanan.html" class="hover:text-blue-300 transition-colors">Pelayanan Online</a></li>
                        <li><a href="statistik.html" class="hover:text-blue-300 transition-colors">Statistik Desa</a></li>
                    </ul>
                    
                    <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path></svg></a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path></svg></a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg></a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 p-2 rounded-full transition-colors"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-800 p-6 rounded-lg mb-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-bold">Berlangganan Berita Desa</h3>
                        <p class="text-blue-100">Dapatkan informasi dan berita terbaru dari Desa Panimbang</p>
                    </div>
                    <div class="w-full md:w-1/3">
                        <form class="flex">
                            <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg w-full text-gray-800 focus:outline-none">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg transition-colors">Langganan</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold mb-2">Jam Operasional Kantor Desa</h3>
                    <div class="flex space-x-4">
                        <div><p class="font-medium">Senin - Kamis:</p><p>08:00 - 16:00 WIB</p></div>
                        <div><p class="font-medium">Jumat:</p><p>08:00 - 14:30 WIB</p></div>
                        <div><p class="font-medium">Sabtu - Minggu:</p><p>Tutup</p></div>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 text-center">
                    <p class="mb-2">Scan untuk informasi lebih lanjut</p>
                    <div class="bg-white p-2 inline-block rounded">
                        <svg class="h-24 w-24 text-blue-900" viewBox="0 0 100 100" fill="currentColor"><rect x="20" y="20" width="60" height="60" fill="white"/><rect x="30" y="30" width="10" height="10"/><rect x="60" y="30" width="10" height="10"/><rect x="30" y="60" width="10" height="10"/><rect x="40" y="40" width="20" height="20"/><rect x="50" y="30" width="10" height="10"/><rect x="30" y="40" width="10" height="10"/><rect x="30" y="50" width="10" height="10"/><rect x="60" y="50" width="10" height="10"/><rect x="50" y="60" width="10" height="10"/></svg>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-6 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2025 Desa Panimbang. Hak Cipta Dilindungi.</p>
                    <div class="flex space-x-4 mt-2 md:mt-0">
                        <a href="#" class="hover:text-blue-300 transition-colors">Ketentuan Penggunaan</a>
                        <a href="#" class="hover:text-blue-300 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-blue-300 transition-colors">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Animasi saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                observer.observe(section);
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nik = document.getElementById('nik').value;
            const noKK = document.getElementById('no_kk').value;
            const nama = document.getElementById('nama').value;
            const jenisPermohonan = document.getElementById('jenis_permohonan').value;
            
            if (!nik || !noKK || !nama || !jenisPermohonan) {
                alert('Mohon lengkapi semua field yang wajib diisi!');
                return;
            }
            
            // Simulasi pengiriman data
            alert('Permohonan Anda telah berhasil dikirim. Silakan cek status permohonan melalui WhatsApp dalam 1x24 jam.');
            this.reset();
        });
    </script>
</body>
</html>