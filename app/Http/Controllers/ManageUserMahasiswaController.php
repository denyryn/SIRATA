<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;

class ManageUserMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswas = Mahasiswa::paginate(10);
        return view('admin.users.mahasiswa.index', compact('data_mahasiswas'));
    }
}
