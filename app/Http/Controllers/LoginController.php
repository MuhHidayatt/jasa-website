<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function indexLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login user
     */
    public function proses(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerasi session agar aman dari session fixation
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil!');
        }

        return redirect()->route('auth.login')->with('error', 'Email atau password salah!');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
    }

    /**
     * Menampilkan halaman register
     */
    public function register()
    {
        // Jika sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return view('auth.register');
    }

    /**
     * Proses penyimpanan data user saat register
     */
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect()->route('auth.login')->with('success', 'Registrasi berhasil. Silakan login.');
        }

        return redirect()->route('auth.register')->with('error', 'Registrasi gagal. Coba lagi!');
    }
}
