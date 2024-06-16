<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\Mahasiswa;
use App\Models\User;


class ProfileMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswa = Session::get('data_mahasiswa');
        $data_user = Session::get('data_user');
        return view("mahasiswa.profile", compact("data_mahasiswa", "data_user"));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'foto_profil' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data_user = User::find($request->session()->get('data_user')->id_user);

        DB::beginTransaction(); // Start database transaction

        try {
            // Handle the uploaded image (with rollback on failure)
            if ($request->hasFile('foto_profil')) {
                if ($data_user->foto_profil) {
                    unlink(public_path($data_user->foto_profil));
                }

                $image = $request->file('foto_profil');
                $imageName = "[" . $data_user->id_user . "]" . time() . '.' . $image->getClientOriginalExtension();
                $image->move('users/images/profile', $imageName);

                $data_user->foto_profil = 'users/images/profile/' . $imageName;
            }

            // Update user data (with rollback on failure)
            if ($request->has('email')) {
                $data_user->email = $request->input('email');
            }

            $data_user->update();
            Session::put('data_user', $data_user);

            DB::commit(); // Commit transaction if all updates succeed

            return redirect()->back()->with('success', 'Profile berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on exception
            return redirect()->back()->with('error', 'Gagal memperbarui diperbarui: ' . $e->getMessage());
        }
    }
}
