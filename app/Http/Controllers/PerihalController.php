<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Surat;
use Illuminate\Http\Request;
use App\Models\perihal;

class perihalController extends Controller
{
    public function index(Request $request)
    {
        $data_perihal = perihal::all();

        return view("admin.perihal.index", compact('data_perihal'));
    }

    public function create()
    {
        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');

        $no = 1;

        $rendered_template = view('surat/template/build', compact('no'))->render();

        return view('admin.perihal.create', compact('opsi_kategori', 'rendered_template'));
    }

    public function store(Request $request)
    {
        $data_perihal = new perihal;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->save();
        return redirect()->route("admin.perihal");
    }

    public function read($id_perihal)
    {
        $data_perihal = perihal::with('kategori')->find($id_perihal);

        if (!$data_perihal) {
            // Handle case where perihal with $id_perihal is not found
            return abort(404, 'Perihal not found'); // Or redirect to appropriate error page
        }

        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori');

        $nama_kategori = $data_perihal->kategori->nama_kategori ?? '';

        $no = 1;

        $rendered_template = view('surat.template.' . $nama_kategori, compact('no', 'data_perihal'))->render();

        return view('admin.perihal.read', compact('no', 'data_perihal', 'opsi_kategori', 'rendered_template'));
    }

    public function edit(Request $request, $id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        return view('admin.perihal', compact('data_perihal'));
    }

    public function update(Request $request, $id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->update();
        return redirect(route('admin.perihal'));
    }

    public function delete($id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->delete();

        return redirect(route('admin.perihal'))->with('success', 'perihal has been deleted successfully');
    }

}


