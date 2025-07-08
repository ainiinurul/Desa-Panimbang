<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil admin.
     */
    public function show()
    {
        // 1. Mengambil data admin yang sedang login
        $admin = Auth::user();

        // 2. Mengirim data ke view dan menampilkannya
        // Kita akan membuat file view 'admin.profile.show' di langkah selanjutnya
        return view('admin.profile.show', [
            'admin' => $admin
        ]);
    }

    /**
     * Menampilkan form untuk mengedit profil admin.
     */
    public function edit()
    {
        // Ambil data admin yang sedang login
        $admin = Auth::user();

        // Tampilkan view 'edit' dan kirim data admin ke sana
        return view('admin.profile.edit', ['admin' => $admin]);
    }
}