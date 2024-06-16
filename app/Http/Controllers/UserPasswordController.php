<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserPasswordController extends Controller
{
    public function index()
    {
        return view('user.password');
    }

    public function update(Request $request)
    {
        $data_user_sekarang = Session::get('data_user');
        $data_user = User::find($data_user_sekarang->id_user);

        if (!Hash::check($request->password_lama, $data_user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sama.');
        }

        if (!($request->password_baru === $request->konfirmasi_password_baru)) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sama.');
        }

        $data_user->password = Hash::make($request->password_baru);
        $data_user->update();

        return redirect()->back()->with('success', 'Password telah berhasil diubah.');
    }

}
