<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Dosen;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $data_jabatan = Jabatan::all();
        $dosens = Dosen::all();

        return view("admin.jabatan.index", compact('data_jabatan', 'dosens'));
    }
    public function create()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data_jabatan = new Jabatan;
        $data_jabatan->nama_jabatan = $request->nama_jabatan;
        $data_jabatan->id_dosen = $request->id_dosen;
        $data_jabatan->save();
        return redirect()->route("admin.jabatan");
    }

    public function edit(Request $request, $id_jabatan)
    {
        $data_jabatan = Jabatan::find($id_jabatan);
        return view('admin.jabatan', compact('data_jabatan'));
    }

    public function update(Request $request, $id_jabatan)
    {
        $data_jabatan = Jabatan::find($id_jabatan);
        $data_jabatan->nama_jabatan = $request->nama_jabatan;
        $data_jabatan->id_dosen = $request->id_dosen;
        $data_jabatan->update();
        return redirect(route('admin.jabatan'));
    }

    public function delete($id_jabatan)
    {
        $data_jabatan = Jabatan::find($id_jabatan);
        $data_jabatan->delete();

        return redirect(route('admin.jabatan'))->with('success', 'Jabatan has been deleted successfully');
    }

}


