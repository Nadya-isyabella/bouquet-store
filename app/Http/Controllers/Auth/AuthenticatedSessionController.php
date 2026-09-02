<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Proses login
        $request->authenticate();

        // Buat session baru
        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // =====================================================
        // REDIRECT BERDASARKAN ROLE
        // =====================================================

        // Admin
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        // Petugas
        if ($user->role === 'petugas') {
            return redirect('/petugas/dashboard');
        }

        // User
        if ($user->role === 'user') {
            return redirect('/user/dashboard');
        }

        // =====================================================
        // JIKA ROLE TIDAK DIKENALI
        // =====================================================

        Auth::logout();

        return redirect('/login')
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}