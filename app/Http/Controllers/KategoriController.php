<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_Surat;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $data_kategori = Kategori_Surat::all();

        return view("admin.kategori_surat.index", compact('data_kategori'));
    }

    public function create()
    {
        return view("admin.kategori_surat.create");
    }

    public function store(Request $request)
    {
        $kategori = new Kategori_Surat;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route("admin.kategori");
    }

    public function edit(Request $request, $id_kategori_surat)
    {
        $kategori = Kategori_Surat::find($id_kategori_surat);
        return view('admin.kategori', compact('kategori'));
    }

    public function update(Request $request, $id_kategori_surat)
    {
        $kategori = Kategori_Surat::find($id_kategori_surat);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save(); // Menggunakan save() untuk menyimpan perubahan
        return redirect(route('admin.kategori'));
    }

    public function delete($id_kategori_surat)
    {
        $kategori = Kategori_Surat::find($id_kategori_surat);
        $kategori->delete();

        return redirect(route('admin.kategori'))->with('success', 'Kategori has been deleted successfully');
    }
}
