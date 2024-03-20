<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;

class ProgramStudi extends Controller
{
    public function index(Request $request)
    {
        $program_studi = Program_Studi::all();
        return view("admin.index", ['program_studi' => $program_studi]);
    }

    public function create()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data_prodi = new Program_Studi;
        $data_prodi->nama_prodi = $request->nama_prodi;
        $data_prodi->save();
        return redirect()->route("admin.index");
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
