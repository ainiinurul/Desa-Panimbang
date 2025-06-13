<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Admin\UserController;

// Rute Publik
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/beranda', [BerandaController::class, 'index']);

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('sejarah');

Route::get('/wilayah', function () {
    return view('wilayah');
})->name('wilayah');

Route::get('/statistik', function () {
    return view('statistik');
})->name('statistik');

Route::get('/pelayanan', function () {
    return view('pelayanan');
})->name('pelayanan');

Route::get('/pengaduan', function () {
    return view('pengaduan');
})->name('pengaduan');

Route::get('/lembaga', function () {
    return view('lembaga');
})->name('lembaga');

// Rute Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Berita routes dengan parameter custom
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    // Manajemen User
    Route::resource('user', UserController::class)->except(['show']);
});

Route::get('/berita/{id}', [App\Http\Controllers\Admin\BeritaController::class, 'show'])->name('berita.show');
// Rute Publik
Route::get('/berita', [BerandaController::class, 'allBerita'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BerandaController::class, 'showBerita'])->name('berita.show');