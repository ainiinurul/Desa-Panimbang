{{-- Upload Foto --}}
<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">
        Foto Perangkat <span class="text-red-500">*</span>
    </label>
    <div class="flex items-center space-x-6">
        <div class="shrink-0">
            @if(isset($perangkat) && $perangkat->foto)
                <img id="imagePreview" src="{{ asset('storage/' . $perangkat->foto) }}" alt="Preview" class="h-32 w-32 object-cover rounded-lg border-2 border-gray-300">
                <div id="imagePlaceholder" class="hidden h-32 w-32 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-image text-3xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Preview Foto</p>
                    </div>
                </div>
            @else
                <img id="imagePreview" src="#" alt="Preview" class="hidden h-32 w-32 object-cover rounded-lg border-2 border-gray-300">
                <div id="imagePlaceholder" class="h-32 w-32 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-image text-3xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Preview Foto</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="flex-1">
            <input type="file" 
                   name="foto" 
                   id="foto" 
                   accept="image/*"
                   onchange="previewImage(this)"
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   {{ !isset($perangkat) ? 'required' : '' }}>
            <p class="mt-2 text-sm text-gray-500">
                <i class="fas fa-info-circle mr-1"></i>
                Format: JPG, JPEG, PNG. Maksimal 2MB.
                @if(isset($perangkat))
                    <span class="text-amber-600">Kosongkan jika tidak ingin mengubah foto.</span>
                @endif
            </p>
        </div>
    </div>
    @error('foto')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Nama Lengkap --}}
<div class="space-y-2">
    <label for="nama" class="block text-sm font-medium text-gray-700">
        Nama Lengkap <span class="text-red-500">*</span>
    </label>
    <input type="text" 
           name="nama" 
           id="nama" 
           value="{{ old('nama', $perangkat->nama ?? '') }}"
           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror"
           placeholder="Masukkan nama lengkap perangkat desa"
           required>
    @error('nama')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Tempat Lahir --}}
<div class="space-y-2">
    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">
        Tempat Lahir
    </label>
    <input type="text" 
            name="tempat_lahir" 
            id="tempat_lahir" 
            value="{{ old('tempat_lahir', $perangkat->tempat_lahir ?? '') }}"
            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tempat_lahir') border-red-500 @enderror"
            placeholder="Masukkan kota kelahiran">
    @error('tempat_lahir')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Tanggal Lahir --}}
<div class="space-y-2">
    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">
        Tanggal Lahir
    </label>
    <input type="date" 
            name="tanggal_lahir" 
            id="tanggal_lahir" 
            value="{{ old('tanggal_lahir', $perangkat->tanggal_lahir ?? '') }}"
            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_lahir') border-red-500 @enderror">
    @error('tanggal_lahir')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Jabatan --}}
<div class="space-y-2">
    <label for="jabatan" class="block text-sm font-medium text-gray-700">
        Jabatan <span class="text-red-500">*</span>
    </label>
    <select name="jabatan" 
            id="jabatan"
            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('jabatan') border-red-500 @enderror"
            required>
        <option value="">-- Pilih Jabatan --</option>
        <option value="Kepala Desa" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Desa' ? 'selected' : '' }}>Kepala Desa</option>
        <option value="Sekretaris Desa" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Sekretaris Desa' ? 'selected' : '' }}>Sekretaris Desa</option>
        <option value="Kaur Keuangan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kaur Keuangan' ? 'selected' : '' }}>Kaur Keuangan</option>
        <option value="Kaur Umum" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kaur Umum' ? 'selected' : '' }}>Kaur Umum</option>
        <option value="Kaur Pembangunan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kaur Pembangunan' ? 'selected' : '' }}>Kaur Pembangunan</option>
        <option value="Kasi Pemerintahan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kasi Pemerintahan' ? 'selected' : '' }}>Kasi Pemerintahan</option>
        <option value="Kasi Kesejahteraan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kasi Kesejahteraan' ? 'selected' : '' }}>Kasi Kesejahteraan</option>
        <option value="Kasi Pelayanan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kasi Pelayanan' ? 'selected' : '' }}>Kasi Pelayanan</option>
        
        {{-- KEPALA DUSUN DENGAN KETERANGAN --}}
        <optgroup label="Kepala Dusun">
            <option value="Kepala Dusun Panimbang" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Panimbang' ? 'selected' : '' }}>Kepala Dusun Panimbang</option>
            <option value="Kepala Dusun Lengkong" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Lengkong' ? 'selected' : '' }}>Kepala Dusun Lengkong</option>
            <option value="Kepala Dusun Cibungur" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Cibungur' ? 'selected' : '' }}>Kepala Dusun Cibungur</option>
            <option value="Kepala Dusun Cikondang" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Cikondang' ? 'selected' : '' }}>Kepala Dusun Cikondang</option>
            <option value="Kepala Dusun Genteng Wetan" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Genteng Wetan' ? 'selected' : '' }}>Kepala Dusun Genteng Wetan</option>
            <option value="Kepala Dusun Genteng Kulon" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Genteng Kulon' ? 'selected' : '' }}>Kepala Dusun Genteng Kulon</option>
            <option value="Kepala Dusun Cikadu" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Kepala Dusun Cikadu' ? 'selected' : '' }}>Kepala Dusun Cikadu</option>
        </optgroup>

        <option value="Ketua RT" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Ketua RT' ? 'selected' : '' }}>Ketua RT</option>
        <option value="Ketua RW" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Ketua RW' ? 'selected' : '' }}>Ketua RW</option>
        <option value="Lainnya" {{ old('jabatan', $perangkat->jabatan ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
    </select>
    @error('jabatan')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Pendidikan --}}
<div class="space-y-2">
    <label for="pendidikan" class="block text-sm font-medium text-gray-700">
        Pendidikan Terakhir
    </label>
    <select name="pendidikan" 
            id="pendidikan"
            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('pendidikan') border-red-500 @enderror">
        <option value="">-- Pilih Pendidikan --</option>
        <option value="SD" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
        <option value="SMP" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'SMP' ? 'selected' : '' }}>SMP</option>
        <option value="SMA/SMK" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
        <option value="D3" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'D3' ? 'selected' : '' }}>Diploma 3 (D3)</option>
        <option value="S1" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'S1' ? 'selected' : '' }}>Sarjana (S1)</option>
        <option value="S2" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'S2' ? 'selected' : '' }}>Magister (S2)</option>
        <option value="S3" {{ old('pendidikan', $perangkat->pendidikan ?? '') == 'S3' ? 'selected' : '' }}>Doktor (S3)</option>
    </select>
    @error('pendidikan')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Alamat --}}
<div class="space-y-2">
    <label for="alamat" class="block text-sm font-medium text-gray-700">
        Alamat
    </label>
    <textarea name="alamat" 
              id="alamat"
              rows="3"
              class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('alamat') border-red-500 @enderror"
              placeholder="Masukkan alamat lengkap">{{ old('alamat', $perangkat->alamat ?? '') }}</textarea>
    @error('alamat')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- No. Telepon --}}
<div class="space-y-2">
    <label for="telepon" class="block text-sm font-medium text-gray-700">
        No. Telepon
    </label>
    <input type="text" 
           name="telepon" 
           id="telepon" 
           value="{{ old('telepon', $perangkat->telepon ?? '') }}"
           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('telepon') border-red-500 @enderror"
           placeholder="Contoh: 081234567890">
    @error('telepon')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>

{{-- Deskripsi --}}
<div class="space-y-2">
    <label for="deskripsi" class="block text-sm font-medium text-gray-700">
        Deskripsi / Keterangan
    </label>
    <textarea name="deskripsi" 
              id="deskripsi"
              rows="4"
              class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('deskripsi') border-red-500 @enderror"
              placeholder="Deskripsi singkat tentang perangkat desa (opsional)">{{ old('deskripsi', $perangkat->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <p class="text-red-500 text-sm mt-1">
            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
        </p>
    @enderror
</div>