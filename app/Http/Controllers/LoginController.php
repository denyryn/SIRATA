<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return redirect('login');
    }

    public function login()
    {
        // Kode selanjutnya untuk menampilkan halaman login
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = auth()->user();
            Session::put('id_user', $user->id_user);
            Session::put('data_user', $user);

            $akses = $user->akses;
            Session::put('akses', $akses);


            if ($akses === 'admin') {
                return redirect(route('admin.index'));
            } elseif ($akses === 'mahasiswa') {
                $data_mahasiswa = Mahasiswa::where('id_user', $user->id_user)->first();
                if (!$data_mahasiswa) {
                    return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
                } else {
                    Session::put('data_mahasiswa', $data_mahasiswa);
                    return redirect(route('mahasiswa.index'));
                }
            } elseif ($akses === 'dosen') {
                $data_dosen = Dosen::where('id_user', $user->id_user)->first();
                if (!$data_dosen) {
                    return redirect()->back()->with('error', 'Data dosen tidak ditemukan.');
                } else {
                    Session::put('data_dosen', $data_dosen);
                    return redirect(route('dosen.index'));
                }
            }
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
