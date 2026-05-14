<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        if (session('is_admin_logged_in')) {
            return redirect()->route('guru.index');
        }

        return view('welcome');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $adminEmail = env('ADMIN_EMAIL', 'admin@sekolah.local');
        $adminPassword = env('ADMIN_PASSWORD', 'admin12345');

        if ($credentials['email'] !== $adminEmail || $credentials['password'] !== $adminPassword) {
            return back()
                ->withErrors(['email' => 'Email atau password admin salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        session([
            'is_admin_logged_in' => true,
            'admin_email' => $adminEmail,
        ]);

        return redirect()->route('guru.index')->with('success', 'Login admin berhasil.');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['is_admin_logged_in', 'admin_email']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
