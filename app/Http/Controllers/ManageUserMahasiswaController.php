<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Program_Studi;
use App\Models\User;

class ManageUserMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('user_search');

        // Construct the base query
        $mahasiswaQuery = Mahasiswa::query();

        // Apply search filters if a search query is provided
        if (!empty($searchQuery)) {
            $mahasiswaQuery->where('nama_mahasiswa', 'like', '%' . $searchQuery . '%')
                ->orWhere('nim', 'like', '%' . $searchQuery . '%');
        }

        $data_dosen = Dosen::get();
        $data_prodi = Program_Studi::get();
        $data_mahasiswas = $mahasiswaQuery->paginate(10);

        return view('admin.users.mahasiswa.index', compact('data_mahasiswas', 'data_prodi', 'data_dosen', 'searchQuery'));
    }


    public function update(Request $request, $id_mahasiswa)
    {
        $data_mahasiswa = Mahasiswa::find($id_mahasiswa);
        $data_mahasiswa->nim = $request->nim;
        $data_mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $data_mahasiswa->id_dosen_pembimbing = $request->id_dosen_pembimbing;
        $data_mahasiswa->id_prodi = $request->id_prodi;
        $data_mahasiswa->update();

        $data_user = User::find($data_mahasiswa->id_user);
        $data_user->username = $data_mahasiswa->nim;
        $data_user->update();

        return redirect()->back()->with('success', 'Data Mahasiswa telah diperbarui');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_user = new User();
            $data_user->username = $request->nim;
            $data_user->password = bcrypt($request->nim);
            $data_user->akses = 'mahasiswa';
            $data_user->save();

            $data_mahasiswa = new Mahasiswa();
            $data_mahasiswa->id_user = $data_user->id_user; // Assuming id_user is the primary key
            $data_mahasiswa->nim = $request->nim;
            $data_mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
            $data_mahasiswa->id_dosen_pembimbing = $request->id_dosen_pembimbing;
            $data_mahasiswa->id_prodi = $request->id_prodi;
            $data_mahasiswa->save();

            DB::commit();

            return redirect()->back()->with('success', 'Data Mahasiswa telah ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Data Mahasiswa gagal ditambahkan.');
        }
    }



}
