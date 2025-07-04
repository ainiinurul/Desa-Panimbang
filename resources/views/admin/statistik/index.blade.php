@extends('layouts.admin')

@section('title', 'Manajemen Statistik Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Konten Halaman Statistik</h2>
            <p class="text-gray-600 mt-1">Kelola semua data statistik desa untuk ditampilkan di halaman publik.</p>
        </div>
    </div>

    {{-- Menampilkan notifikasi --}}
    @if (session('success'))
    <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.statistik.update') }}" method="POST" class="space-y-8">
        @csrf

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">1. Kependudukan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <div>
                    <label for="penduduk_pria" class="block text-sm font-medium text-gray-700">Laki-laki</label>
                    <input type="number" name="penduduk_pria" id="penduduk_pria" value="{{ old('penduduk_pria', $statistik->penduduk_pria) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="penduduk_wanita" class="block text-sm font-medium text-gray-700">Perempuan</label>
                    <input type="number" name="penduduk_wanita" id="penduduk_wanita" value="{{ old('penduduk_wanita', $statistik->penduduk_wanita) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="usia_anak" class="block text-sm font-medium text-gray-700">Usia 0-14</label>
                    <input type="number" name="usia_anak" id="usia_anak" value="{{ old('usia_anak', $statistik->usia_anak) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="usia_produktif" class="block text-sm font-medium text-gray-700">Usia 15-64</label>
                    <input type="number" name="usia_produktif" id="usia_produktif" value="{{ old('usia_produktif', $statistik->usia_produktif) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="usia_lansia" class="block text-sm font-medium text-gray-700">Usia 65+</label>
                    <input type="number" name="usia_lansia" id="usia_lansia" value="{{ old('usia_lansia', $statistik->usia_lansia) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">2. Pendidikan</h3>
            <h4 class="text-md font-semibold text-gray-700 mb-2">Tingkat Pendidikan Penduduk</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div>
                    <label for="pendidikan_sd" class="block text-sm font-medium text-gray-700">SD</label>
                    <input type="number" name="pendidikan_sd" id="pendidikan_sd" value="{{ old('pendidikan_sd', $statistik->pendidikan_sd) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="pendidikan_smp" class="block text-sm font-medium text-gray-700">SMP</label>
                    <input type="number" name="pendidikan_smp" id="pendidikan_smp" value="{{ old('pendidikan_smp', $statistik->pendidikan_smp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="pendidikan_sma" class="block text-sm font-medium text-gray-700">SMA</label>
                    <input type="number" name="pendidikan_sma" id="pendidikan_sma" value="{{ old('pendidikan_sma', $statistik->pendidikan_sma) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="pendidikan_pt" class="block text-sm font-medium text-gray-700">Perguruan Tinggi</label>
                    <input type="number" name="pendidikan_pt" id="pendidikan_pt" value="{{ old('pendidikan_pt', $statistik->pendidikan_pt) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
            <h4 class="text-md font-semibold text-gray-700 mb-2">Jumlah Fasilitas Pendidikan</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label for="fasilitas_paud" class="block text-sm font-medium text-gray-700">PAUD/TK</label>
                    <input type="number" name="fasilitas_paud" id="fasilitas_paud" value="{{ old('fasilitas_paud', $statistik->fasilitas_paud) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="fasilitas_sd" class="block text-sm font-medium text-gray-700">SD/MI</label>
                    <input type="number" name="fasilitas_sd" id="fasilitas_sd" value="{{ old('fasilitas_sd', $statistik->fasilitas_sd) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="fasilitas_smp" class="block text-sm font-medium text-gray-700">SMP/MTS</label>
                    <input type="number" name="fasilitas_smp" id="fasilitas_smp" value="{{ old('fasilitas_smp', $statistik->fasilitas_smp) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="fasilitas_sma" class="block text-sm font-medium text-gray-700">SMA/MA</label>
                    <input type="number" name="fasilitas_sma" id="fasilitas_sma" value="{{ old('fasilitas_sma', $statistik->fasilitas_sma) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">3. Sarana & Prasarana</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div><label class="font-bold">Kesehatan</label></div><div></div><div></div><div></div>
                <div>
                    <label for="sarana_puskesmas" class="block text-sm font-medium text-gray-700">Puskesmas</label>
                    <input type="number" name="sarana_puskesmas" id="sarana_puskesmas" value="{{ old('sarana_puskesmas', $statistik->sarana_puskesmas) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_posyandu" class="block text-sm font-medium text-gray-700">Posyandu</label>
                    <input type="number" name="sarana_posyandu" id="sarana_posyandu" value="{{ old('sarana_posyandu', $statistik->sarana_posyandu) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_bidan" class="block text-sm font-medium text-gray-700">Bidan Desa</label>
                    <input type="number" name="sarana_bidan" id="sarana_bidan" value="{{ old('sarana_bidan', $statistik->sarana_bidan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_apotek" class="block text-sm font-medium text-gray-700">Apotek</label>
                    <input type="number" name="sarana_apotek" id="sarana_apotek" value="{{ old('sarana_apotek', $statistik->sarana_apotek) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="col-span-full mt-4"><label class="font-bold">Ibadah</label></div>
                <div>
                    <label for="sarana_masjid" class="block text-sm font-medium text-gray-700">Masjid</label>
                    <input type="number" name="sarana_masjid" id="sarana_masjid" value="{{ old('sarana_masjid', $statistik->sarana_masjid) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_mushola" class="block text-sm font-medium text-gray-700">Mushola</label>
                    <input type="number" name="sarana_mushola" id="sarana_mushola" value="{{ old('sarana_mushola', $statistik->sarana_mushola) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_gereja" class="block text-sm font-medium text-gray-700">Gereja</label>
                    <input type="number" name="sarana_gereja" id="sarana_gereja" value="{{ old('sarana_gereja', $statistik->sarana_gereja) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_pura" class="block text-sm font-medium text-gray-700">Pura</label>
                    <input type="number" name="sarana_pura" id="sarana_pura" value="{{ old('sarana_pura', $statistik->sarana_pura) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="col-span-full mt-4"><label class="font-bold">Infrastruktur</label></div>
                <div>
                    <label for="sarana_jalan_km" class="block text-sm font-medium text-gray-700">Jalan Desa (km)</label>
                    <input type="number" step="0.1" name="sarana_jalan_km" id="sarana_jalan_km" value="{{ old('sarana_jalan_km', $statistik->sarana_jalan_km) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_jembatan" class="block text-sm font-medium text-gray-700">Jembatan</label>
                    <input type="number" name="sarana_jembatan" id="sarana_jembatan" value="{{ old('sarana_jembatan', $statistik->sarana_jembatan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_irigasi_km" class="block text-sm font-medium text-gray-700">Saluran Irigasi (km)</label>
                    <input type="number" step="0.1" name="sarana_irigasi_km" id="sarana_irigasi_km" value="{{ old('sarana_irigasi_km', $statistik->sarana_irigasi_km) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="sarana_bts" class="block text-sm font-medium text-gray-700">Menara BTS</label>
                    <input type="number" name="sarana_bts" id="sarana_bts" value="{{ old('sarana_bts', $statistik->sarana_bts) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">4. APB Desa (Anggaran)</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label for="apb_pad" class="block text-sm font-medium text-gray-700">Pendapatan Asli Desa (Rp)</label>
                    <input type="number" name="apb_pad" id="apb_pad" value="{{ old('apb_pad', $statistik->apb_pad) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="apb_dana_desa" class="block text-sm font-medium text-gray-700">Dana Desa (Rp)</label>
                    <input type="number" name="apb_dana_desa" id="apb_dana_desa" value="{{ old('apb_dana_desa', $statistik->apb_dana_desa) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="apb_alokasi_dana" class="block text-sm font-medium text-gray-700">Alokasi Dana Desa (Rp)</label>
                    <input type="number" name="apb_alokasi_dana" id="apb_alokasi_dana" value="{{ old('apb_alokasi_dana', $statistik->apb_alokasi_dana) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="apb_bantuan" class="block text-sm font-medium text-gray-700">Bantuan (Rp)</label>
                    <input type="number" name="apb_bantuan" id="apb_bantuan" value="{{ old('apb_bantuan', $statistik->apb_bantuan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">5. Posyandu</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="posyandu_jumlah_balita" class="block text-sm font-medium text-gray-700">Jumlah Balita</label>
                    <input type="number" name="posyandu_jumlah_balita" id="posyandu_jumlah_balita" value="{{ old('posyandu_jumlah_balita', $statistik->posyandu_jumlah_balita) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="posyandu_jumlah_bumil" class="block text-sm font-medium text-gray-700">Jumlah Ibu Hamil</label>
                    <input type="number" name="posyandu_jumlah_bumil" id="posyandu_jumlah_bumil" value="{{ old('posyandu_jumlah_bumil', $statistik->posyandu_jumlah_bumil) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="posyandu_jumlah_posyandu" class="block text-sm font-medium text-gray-700">Jumlah Posyandu</label>
                    <input type="number" name="posyandu_jumlah_posyandu" id="posyandu_jumlah_posyandu" value="{{ old('posyandu_jumlah_posyandu', $statistik->posyandu_jumlah_posyandu) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
            <h4 class="text-md font-semibold text-gray-700 mb-2">Data Chart Balita Berdasarkan Umur (Bulan)</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">
                <div>
                    <label class="font-bold text-sm">Laki-laki</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs">0-5</label>
                            <input type="number" name="posyandu_chart_pria[]" value="{{ old('posyandu_chart_pria.0', $statistik->posyandu_chart_pria[0] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">6-11</label>
                            <input type="number" name="posyandu_chart_pria[]" value="{{ old('posyandu_chart_pria.1', $statistik->posyandu_chart_pria[1] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">12-24</label>
                            <input type="number" name="posyandu_chart_pria[]" value="{{ old('posyandu_chart_pria.2', $statistik->posyandu_chart_pria[2] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">25-59</label>
                            <input type="number" name="posyandu_chart_pria[]" value="{{ old('posyandu_chart_pria.3', $statistik->posyandu_chart_pria[3] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="font-bold text-sm">Perempuan</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs">0-5</label>
                            <input type="number" name="posyandu_chart_wanita[]" value="{{ old('posyandu_chart_wanita.0', $statistik->posyandu_chart_wanita[0] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">6-11</label>
                            <input type="number" name="posyandu_chart_wanita[]" value="{{ old('posyandu_chart_wanita.1', $statistik->posyandu_chart_wanita[1] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">12-24</label>
                            <input type="number" name="posyandu_chart_wanita[]" value="{{ old('posyandu_chart_wanita.2', $statistik->posyandu_chart_wanita[2] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-xs">25-59</label>
                            <input type="number" name="posyandu_chart_wanita[]" value="{{ old('posyandu_chart_wanita.3', $statistik->posyandu_chart_wanita[3] ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">6. Indeks Desa Membangun (IDM)</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label for="idm_skor" class="block text-sm font-medium text-gray-700">Skor IDM</label>
                    <input type="number" step="0.01" name="idm_skor" id="idm_skor" value="{{ old('idm_skor', $statistik->idm_skor) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="idm_status" class="block text-sm font-medium text-gray-700">Status IDM</label>
                    <input type="text" name="idm_status" id="idm_status" value="{{ old('idm_status', $statistik->idm_status) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="idm_target" class="block text-sm font-medium text-gray-700">Target Status</label>
                    <input type="text" name="idm_target" id="idm_target" value="{{ old('idm_target', $statistik->idm_target) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="idm_skor_minimal" class="block text-sm font-medium text-gray-700">Skor Minimal</label>
                    <input type="number" step="0.01" name="idm_skor_minimal" id="idm_skor_minimal" value="{{ old('idm_skor_minimal', $statistik->idm_skor_minimal) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="col-span-full mt-4"><label class="font-bold">Komponen Indeks</label></div>
                <div>
                    <label for="idm_ikl" class="block text-sm font-medium text-gray-700">IKL (Lingkungan)</label>
                    <input type="number" step="0.01" name="idm_ikl" id="idm_ikl" value="{{ old('idm_ikl', $statistik->idm_ikl) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="idm_iks" class="block text-sm font-medium text-gray-700">IKS (Sosial)</label>
                    <input type="number" step="0.01" name="idm_iks" id="idm_iks" value="{{ old('idm_iks', $statistik->idm_iks) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="idm_ike" class="block text-sm font-medium text-gray-700">IKE (Ekonomi)</label>
                    <input type="number" step="0.01" name="idm_ike" id="idm_ike" value="{{ old('idm_ike', $statistik->idm_ike) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="col-span-full mt-4"><label class="font-bold">Tahun</label></div>
                <div>
                    <label for="idm_tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <input type="number" name="idm_tahun" id="idm_tahun" value="{{ old('idm_tahun', $statistik->idm_tahun ?? date('Y')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="2000" max="2099">
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-8">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-3 rounded-lg shadow-lg">
                <i class="fas fa-save mr-2"></i>Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logika untuk menghilangkan alert setelah 5 detik
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s ease-out';
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 500);
        }, 5000);
    }
});
</script>
@endsection