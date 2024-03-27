<?php

namespace App\Http\Controllers;

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
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data_perihal = new perihal;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->save();
        return redirect()->route("admin.perihal");
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


