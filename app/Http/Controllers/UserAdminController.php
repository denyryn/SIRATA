<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;
use App\Models\Jabatan;
use App\Models\Kategori_Surat;
use App\Models\Status;
use App\Models\Perihal;
use App\Models\Surat;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        $total_surat = Surat::count();

        $total_prodi = Program_Studi::count();

        $total_jabatan = Jabatan::count();

        $total_kategori = Kategori_Surat::count();

        $total_perihal = Perihal::count();

        return view("admin.dashboard", compact('total_surat', 'total_prodi', 'total_jabatan', 'total_kategori', 'total_perihal'));
    }
}
