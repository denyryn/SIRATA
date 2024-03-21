<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program_Studi;

class ProgramStudi extends Controller
{
    public function index(Request $request)
    {
        $data_prodi = Program_Studi::all();

        return view("admin.manage_prodi", compact('data_prodi'));
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
        return redirect()->route("admin.prodi");
    }

    public function edit(Request $request, $id_prodi)
    {
        $data_prodi = Program_Studi::find($id_prodi);
        return view('admin.prodi', compact('data_prodi'));
    }
    public function update(Request $request, $id_prodi)
    {
        $data_prodi = Program_Studi::find($id_prodi);
        $data_prodi->nama_prodi = $request->nama_prodi;
        $data_prodi->update();
        return redirect(route('admin.prodi'));
    }

    public function delete($id_prodi)
    {
        $data_prodi = Program_Studi::find($id_prodi);
        $data_prodi->delete();

        return redirect(route('admin.prodi'))->with('success', 'Prodi has been deleted successfully');
    }

}
