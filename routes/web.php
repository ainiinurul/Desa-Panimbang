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
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PerangkatDesaController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\SejarahDesaController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\WilayahDesaController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\StatistikDesaController;
use App\Http\Controllers\ProgramDesaController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/beranda', [BerandaController::class, 'index']);

// Halaman statis lainnya
//Route::get('/sejarah', function () { return view('sejarah'); })->name('sejarah');
//Route::get('/wilayah', function () { return view('wilayah'); })->name('wilayah');
//Route::get('/statistik', function () { return view('statistik'); })->name('statistik');
Route::get('/pelayanan', function () { return view('pelayanan'); })->name('pelayanan');
Route::get('/pengaduan', function () { return view('pengaduan'); })->name('pengaduan');

// INI ADALAH ROUTE PUBLIK UNTUK HALAMAN LEMBAGA
Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');

//Rute untuk Program (Publik)
Route::get('/program', [ProgramDesaController::class, 'index'])->name('program');
Route::get('/program/{program:slug}', [ProgramDesaController::class, 'show'])->name('program.show');

// Rute untuk Berita (Publik)
Route::get('/berita', [BerandaController::class, 'allBerita'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BerandaController::class, 'showBerita'])->name('berita.show');

// Rute untuk Pelayanan
Route::post('/pelayanan/store', [App\Http\Controllers\Admin\PelayananController::class, 'store'])->name('pelayanan.store');

// Rute untuk Pengaduan
Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Rute untuk menampilkan halaman sejarah publik
Route::get('/sejarah', [SejarahDesaController::class, 'index'])->name('sejarah');

//Route untuk menampilkan halaman wilayah publik
Route::get('/wilayah', [WilayahDesaController::class, 'index'])->name('wilayah');

//Route untuk menampilkan halaman statistik publik
Route::get('/statistik', [StatistikDesaController::class, 'index'])->name('statistik');


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
    //Profile
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Berita
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);

    // Manajemen User
    Route::resource('user', UserController::class)->except(['show']);

    // Manajemen Program Desa
    Route::resource('programs', ProgramController::class);

    // Manajemen Setting Beranda
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Rute untuk Pelayanan
    Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');
    Route::post('/pelayanan/store', [PelayananController::class, 'store'])->name('pelayanan.store');
    Route::delete('/pelayanan/{pelayanan}', [PelayananController::class, 'destroy'])->name('pelayanan.destroy');
    Route::patch('/pelayanan/{pelayanan}/update-status', [PelayananController::class, 'updateStatus'])->name('pelayanan.updateStatus');
    Route::get('/pelayanan/{pelayanan}/detail', [PelayananController::class, 'show'])->name('pelayanan.detail');

    // Rute untuk Manajemen Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::patch('/pengaduan/{pengaduan}/update-status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/pengaduan/{pengaduan}/detail', [PengaduanController::class, 'show'])->name('pengaduan.detail');

    // Route untuk Manajemen Lembaga (INI YANG SUDAH DIPERBAIKI)
    Route::resource('lembaga', PerangkatDesaController::class);
    
    // TAMBAHAN: Route untuk detail perangkat desa (AJAX)
    Route::get('/lembaga/{lembaga}/detail', [PerangkatDesaController::class, 'detail'])->name('lembaga.detail');

    // RUTE UNTUK MANAJEMEN SEJARAH
    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah.index');
    Route::post('/sejarah/update', [SejarahController::class, 'update'])->name('sejarah.update');

    // RUTE UNTUK MANAJEMEN WILAYAH (TAMBAHKAN INI)
    Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
    Route::post('/wilayah/update', [WilayahController::class, 'update'])->name('wilayah.update');

    // RUTE UNTUK MANAJEMEN STATISTIK (TAMBAHKAN INI)
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::post('/statistik/update', [StatistikController::class, 'update'])->name('statistik.update');
});