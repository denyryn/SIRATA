<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\User;

class ManageUserDosenController extends Controller
{
    public function index()
    {
        $data_dosens = Dosen::paginate(10);
        return view('admin.users.dosen.index', compact('data_dosens'));
    }

    public function update(Request $request, $id_dosen)
    {
        $data_dosen = Dosen::find($id_dosen);
        $data_dosen->nip = $request->nip;
        $data_dosen->nidn = $request->nidn;
        $data_dosen->id_prodi = $request->id_prodi;
        $data_dosen->gelar_depan = $request->gelar_depan;
        $data_dosen->nama_dosen = $request->nama_dosen;
        $data_dosen->gelar_belakang = $request->gelar_belakang;
        $data_dosen->golongan = $request->golongan;
        $data_dosen->update();

        $data_user = User::find($data_dosen->id_user);
        $data_user->username = $data_dosen->nip;
        $data_user->update();

        return redirect()->back()->with('success', 'Data dosen telah diperbarui');
    }
}
