<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            if (Auth::user()->akses == 'admin') {
                \Log::info('Admin login successful');
                return redirect()->intended('/admin/dashboard');
            } elseif (Auth::user()->akses == 'user') {
                \Log::info('User login successful');
                return redirect()->intended('/mahasiswa/dashboard');
            }
        }
    
        // Autentikasi gagal
        \Log::error('Login failed: Invalid credentials');
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
