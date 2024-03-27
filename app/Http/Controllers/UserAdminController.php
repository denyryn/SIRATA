<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;
use App\Models\Jabatan;
use App\Models\Kategori_Surat;
use App\Models\Status;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        $data_prodi = Program_Studi::all();
        $total_prodi = Program_Studi::count();

        $data_jabatan = Jabatan::all();
        $total_jabatan = Jabatan::count();

        $data_kategori = Kategori_Surat::all();
        $total_kategori = Kategori_Surat::count();

        $data_status = Status::all();
        $total_status = Status::count();

        return view("admin.dashboard", compact('data_prodi', 'total_prodi', 'data_jabatan', 'total_jabatan', 'total_kategori', 'total_status'));
    }
}
