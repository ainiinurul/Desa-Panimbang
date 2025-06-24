<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // --- PERBAIKAN DI SINI ---
            // Menggunakan route('beranda') sebagai fallback untuk intended()
            return redirect()->intended(route('beranda'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menampilkan form register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);

        // --- PERBAIKAN DI SINI ---
        // Menggunakan nama rute 'beranda'
        return redirect()->route('beranda')->with('success', 'Registrasi berhasil!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}