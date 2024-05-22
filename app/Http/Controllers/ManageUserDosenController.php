<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;

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
        // $data_dosen->nip = $request->nip;
        // $data_dosen->nidn = $request->nidn;
        // $data_dosen->nama_dosen = $request->nama_dosen;
        $data_dosen->golongan = $request->golongan;
        $data_dosen->update();
        return redirect(route('admin.manage_users.dosen'));
    }
}
