<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function index()
    {
        // return view('auths.welcome');
        return view('auths.welcome');
    
    }

    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            // Periksa peran pengguna dan arahkan ke halaman yang sesuai
            if (auth()->user()->akses === 'admin') {
                return redirect(route('admin.index'));
            } elseif (auth()->user()->akses === 'mahasiswa') {
                return redirect(route('mahasiswa.index'));
            }
        }
        
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
