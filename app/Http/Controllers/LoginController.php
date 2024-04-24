<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auths.welcome');
        // return redirect('welcome.index');

    }

    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            $id_user = auth()->id();
            Session::put('id_user', $id_user);

            // Fetch the user's role from the database using the stored user ID
            $user = User::find($id_user);

            // Periksa peran pengguna dan arahkan ke halaman yang sesuai
            if ($user) {
                $akses = $user->akses;

                // Store the user's role in the session
                Session::put('akses', $akses);

                // Redirect based on the user's role
                if ($akses === 'admin') {
                    return redirect(route('admin.index'));
                } elseif ($akses === 'mahasiswa') {
                    return redirect(route('mahasiswa.index'));
                }
            }
        }
        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
