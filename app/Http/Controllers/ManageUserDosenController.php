<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Dosen;
use App\Models\Program_Studi;
use App\Models\User;

class ManageUserDosenController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('user_search');

        // Construct the base query
        $dosenQuery = Dosen::query();

        // Apply search filters if a search query is provided
        if (!empty($searchQuery)) {
            $dosenQuery->where('nama_dosen', 'like', '%' . $searchQuery . '%')
                ->orWhere('nip', 'like', '%' . $searchQuery . '%');
        }

        $data_prodi = Program_Studi::get();
        $data_dosens = $dosenQuery->paginate(10);

        return view('admin.users.dosen.index', compact('data_dosens', 'data_prodi', 'searchQuery'));
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

        return redirect()->back()->with('success', 'Data dosen telah diperbarui.');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_user = new User();
            $data_user->username = $request->nip;
            $data_user->password = bcrypt($request->nip);
            $data_user->akses = 'dosen';
            $data_user->save();

            $data_dosen = new Dosen();
            $data_dosen->id_user = $data_user->id;
            $data_dosen->nip = $request->nip;
            $data_dosen->nidn = $request->nidn;
            $data_dosen->id_prodi = $request->id_prodi;
            $data_dosen->gelar_depan = $request->gelar_depan;
            $data_dosen->nama_dosen = $request->nama_dosen;
            $data_dosen->gelar_belakang = $request->gelar_belakang;
            $data_dosen->golongan = $request->golongan;
            $data_dosen->save();

            DB::commit();

            return redirect()->back()->with('success', 'Data dosen telah ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal menambahkan data dosen.');
        }
    }
}
