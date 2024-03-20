<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;

class ProgramStudi extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function read(Request $request)
    {
        $program_studi = Program_Studi::select()->get();
        return view('admin.index', ['program_studis' => $program_studi]);
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete()
    {

    }
}
