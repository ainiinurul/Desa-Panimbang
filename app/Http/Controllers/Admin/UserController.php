<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        // Update password only if provided
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil dihapus');
    }
}