<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Mahasiswa;
use App\Models\User;


class ProfileMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswa = Session::get('data_mahasiswa');
        return view("mahasiswa.profile", compact("data_mahasiswa"));
    }

    public function update(Request $request, $id_mahasiswa)
    {
        // Validate the incoming request, ensuring it contains a file
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data_mahasiswa = Mahasiswa::find($id_mahasiswa);
        $data_user = User::find($data_mahasiswa->id_user);

        // Handle the uploaded image
        if ($request->hasFile('foto_profil')) {
            $image = $request->file('foto_profil');
            $imageName = $data_mahasiswa->id_user . time() . '.' . $image->getClientOriginalExtension();
            $image->move('users/images/profile', $imageName);

            $data_user->foto_profil = 'users/images/profile/' . $imageName;
            $data_user->save();

            return redirect()->back()->with('success', 'Profile image updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update profile image.');
    }
}
