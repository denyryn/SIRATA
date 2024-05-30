<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Dosen;
use App\Models\User;

class ProfileDosenController extends Controller
{
    public function index()
    {
        $data_dosen = Session::get('data_dosen');
        dd($data_dosen->user->foto_profil);
        return view("dosen.profile", compact("data_dosen"));
    }

    public function update(Request $request, $id_dosen)
    {
        // Validate the incoming request, ensuring it contains a file
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data_dosen = Dosen::find($id_dosen);
        $data_user = User::find($data_dosen->id_user);

        // Handle the uploaded image
        if ($request->hasFile('foto_profil')) {
            $image = $request->file('foto_profil');
            $imageName = $data_dosen->id_user . time() . '.' . $image->getClientOriginalExtension();
            $image->move('users/images/profile', $imageName);

            $data_user->foto_profil = 'users/images/profile/' . $imageName;
            $data_user->save();

            return redirect()->back()->with('success', 'Profile image updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update profile image.');
    }
}
