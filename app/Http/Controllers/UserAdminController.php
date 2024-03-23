<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        $data_prodi = Program_Studi::all();
        $total_prodi = Program_Studi::count();
        $data_jabatan = Jabatan::all();
        $total_jabatan = Jabatan::count();

        return view("admin.dashboard", compact('data_prodi', 'total_prodi'));
    }
}
