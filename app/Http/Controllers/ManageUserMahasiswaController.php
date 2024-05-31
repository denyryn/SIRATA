<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\User;

class ManageUserMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswas = Mahasiswa::paginate(10);
        return view('admin.users.mahasiswa.index', compact('data_mahasiswas'));
    }

    public function update(Request $request, $id_mahasiswa)
    {
        $data_mahasiswa = Mahasiswa::find($id_mahasiswa);
        $data_mahasiswa->nip = $request->nim;
        $data_mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $data_mahasiswa->id_dosen_pembimbing = $request->id_dosen_pembimbing;
        $data_mahasiswa->id_prodi = $request->id_prodi;
        $data_mahasiswa->update();

        $data_user = User::find($data_mahasiswa->id_user);
        $data_user->username = $data_mahasiswa->nip;
        $data_user->update();

        return redirect()->back()->with('success', 'Data dosen telah diperbarui');
    }
}
