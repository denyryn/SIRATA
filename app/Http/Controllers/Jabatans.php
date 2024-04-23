<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class Jabatans extends Controller
{
    public function index(Request $request)
    {
        $data_jabatan = Jabatan::all();

        return view("admin.manage_jabatan", compact('data_jabatan'));
    }
    public function create()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data_jabatan = new Jabatan;
        $data_jabatan->nama_jabatan = $request->nama_jabatan;
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


