<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PelayananController;

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/

// Ini rute untuk halaman utama (/)
Route::get('/', [BerandaController::class, 'index']);

// Halaman utama (beranda)
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda'); //

// Halaman statis lainnya
Route::get('/sejarah', function () { return view('sejarah'); })->name('sejarah');
Route::get('/wilayah', function () { return view('wilayah'); })->name('wilayah');
Route::get('/statistik', function () { return view('statistik'); })->name('statistik');
Route::get('/pelayanan', function () { return view('pelayanan'); })->name('pelayanan');
Route::get('/pengaduan', function () { return view('pengaduan'); })->name('pengaduan');
Route::get('/lembaga', function () { return view('lembaga'); })->name('lembaga');

// Rute untuk Berita (Publik)
Route::get('/berita', [BerandaController::class, 'allBerita'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BerandaController::class, 'showBerita'])->name('berita.show');

// Tambahkan route ini di bagian rute publik (sebelum rute admin)
Route::post('/pelayanan/store', [App\Http\Controllers\Admin\PelayananController::class, 'store'])->name('pelayanan.store');


/*
|--------------------------------------------------------------------------
| Rute Autentikasi
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Berita
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);

    // Manajemen User
    Route::resource('user', UserController::class)->except(['show']);

    // --- INI PERBAIKANNYA ---
    // Manajemen Program Desa (tanpa /admin/ di dalamnya)
    Route::resource('programs', ProgramController::class);

    // Manajemen Setting Beranda
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Rute untuk Manajemen Pelayanan
    Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');
    Route::put('/pelayanan/{id}/status', [PelayananController::class, 'updateStatus'])->name('pelayanan.updateStatus');
    
    // TAMBAHKAN RUTE INI
    Route::delete('/pelayanan/{pelayanan}', [PelayananController::class, 'destroy'])->name('pelayanan.destroy');
});

    // KODE INVESTIGASI SEMENTARA
Route::get('/debug', function() {
    dd(config('database.connections.mysql'));
});

// Kurung kurawal ekstra di akhir file sudah dihapus