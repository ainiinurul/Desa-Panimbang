<?php

namespace App\Http\Middleware; // Perbaiki typo di namespace

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Debugging: Cek role user
        Log::info('CheckRole middleware executed', [
            'user' => $user,
            'roles' => $roles
        ]);

        if (!$user->role) {
            abort(403, 'User does not have any role assigned');
        }

        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
