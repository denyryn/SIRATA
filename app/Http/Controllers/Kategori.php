<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_Surat;

class Kategori extends Controller
{
    public function index(Request $request)
    {
        $data_kategori = Kategori_Surat::all();

        return view("admin.manage_kategori", compact('data_kategori'));
    }

    public function create()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $kategori = new Kategori_Surat;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route("admin.kategori");
    }

    public function edit(Request $request, $id_kategori)
    {
        $kategori = Kategori_Surat::find($id_kategori);
        return view('admin.kategori', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori_Surat::find($id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save(); // Menggunakan save() untuk menyimpan perubahan
        return redirect(route('admin.kategori'));
    }

    public function delete($id_kategori)
    {
        $kategori = Kategori_Surat::find($id_kategori);
        $kategori->delete();

        return redirect(route('admin.kategori'))->with('success', 'Kategori has been deleted successfully');
    }
}