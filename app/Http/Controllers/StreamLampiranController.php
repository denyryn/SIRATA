<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;

class StreamLampiranController extends Controller
{
    public function index($id_surat)
    {
        $data_surat = Surat::find($id_surat);
        $file_lampiran = $data_surat->lampiran;

        return response()->file(public_path($file_lampiran));
    }
}
