<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\perihal;
use App\Models\Kategori_Surat;

class PerihalController extends Controller
{
    public function index(Request $request)
    {
        $data_perihal = perihal::all();
        $kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');

        return view("admin.perihal.index", compact('data_perihal', 'kategori'));
    }

    public function store(Request $request)
    {
        $data_perihal = new perihal;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->template = $request->template;
        $data_perihal->save();
        return redirect()->route("admin.perihal");
    }

    public function edit(Request $request, $id_perihal)
    {
        $data_perihal = Perihal::find($id_perihal);
        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');

        // Render the Blade template content
        $renderedTemplate = view('surat/template/allinone', compact('data_perihal'))->render();


        return view('admin.perihal.edit', compact('data_perihal', 'opsi_kategori', 'renderedTemplate'));
    }


    public function update(Request $request, $id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->template = $request->template;
        $data_perihal->update();
        return redirect(route('admin.perihal'));
    }

    public function delete($id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->delete();

        return redirect(route('admin.perihal'))->with('success', 'perihal has been deleted successfully');
    }

    public function create()
    {
        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');
        return view('admin.perihal.create', compact('opsi_kategori'));
    }

}


