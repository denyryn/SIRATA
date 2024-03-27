<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $data_status = Status::all();
        return view("admin.status.index", compact('data_status'));
    }

    public function create()
    {
        return view("admin.index");
    }

    public function store(Request $request)
    {
        $data_status = new Status;
        $data_status->nama_status = $request->nama_status;
        $data_status->save();
        return redirect()->route("admin.status");
    }

    public function edit(Request $request, $id_status)
    {
        $data_status = Status::find($id_status);
        return view('admin.prodi', compact('data_status'));
    }
    public function update(Request $request, $id_status)
    {
        $data_status = Status::find($id_status);
        $data_status->nama_status = $request->nama_status;
        $data_status->update();
        return redirect(route('admin.status'));
    }

    public function delete($id_status)
    {
        $data_status = Status::find($id_status);
        $data_status->delete();

        return redirect(route('admin.status'))->with('success', 'Status has been deleted successfully');
    }

}
