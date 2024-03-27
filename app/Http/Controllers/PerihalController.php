<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perihal;


class PerihalController extends Controller
{
    public function index(Request $request)
    {
        $data_perihal = Perihal::all();
        return view("admin.perihal.index", compact('data_perihal'));
    }
    public function create()
    {
        return view("admin.perihal.create");
    }
    public function show($id_perihal)
    {
        $data_perihal = Perihal::findOrFail($id_perihal);
        return view("admin.perihal_detail", compact('perihal'));
    }
    public function store(Request $request)
    {
        $data_perihal = new Perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->template = $request->template;
        $data_perihal->save();
        return redirect()->route("admin.perihal");
    }
    public function update(Request $request, $id_perihal)
    {
        $data_perihal = Perihal::find($id_perihal);
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->template = $request->template;

        $data_perihal->update();
        return redirect(route('admin.perihal'));
    }

    public function delete($id_perihal)
    {
        $data_perihal = Perihal::find($id_perihal);
        $data_perihal->delete();

        return redirect(route('admin.perihal'))->with('success', 'Prodi has been deleted successfully');
    }
}
