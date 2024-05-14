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
        if (Auth::attempt($request->only(['username', 'password']))) {
            $id_user = auth()->id();
            Session::put('id_user', $id_user);

            // Fetch the user's role from the database using the stored user ID
            $user = User::find($id_user);
            Session::put('data_user', $user);

            // Periksa peran pengguna dan arahkan ke halaman yang sesuai
            if ($user) {
                $akses = $user->akses;

                // Store the user's role in the session
                Session::put('akses', $akses);

                // Redirect based on the user's role
                if ($akses === 'admin') {
                    return redirect(route('admin.index'));
                } elseif ($akses === 'mahasiswa') {
                    // Retrieve data from the 'mahasiswa' table based on the user's ID
                    $data_mahasiswa = Mahasiswa::where('id_user', $user->id_user)->first();
                    if ($data_mahasiswa) {
                        // Store the retrieved data in the session
                        Session::put('data_mahasiswa', $data_mahasiswa);
                        return redirect(route('mahasiswa.index'));
                    } else {
                        // Handle the case where no matching data is found for the user
                        return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
                }
                
                } elseif ($akses === 'dosen') {
                    // Retrieve data from the 'dosen' table based on the user's ID
                    $data_dosen = Dosen::where('id_user', $user->id_user)->first();
                    if ($data_dosen) {
                        // Store the retrieved data in the session
                        Session::put('data_dosen', $data_dosen);
                        return redirect(route('dosen.index'));
                    } else {
                        // Handle the case where no matching data is found for the user
                        return redirect()->back()->with('error', 'Data dosen tidak ditemukan.');
                    }
                }
                
        }
        return redirect(route('login'));
    }
}


    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
