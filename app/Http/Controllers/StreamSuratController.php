<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;

class StreamSuratController extends Controller
{
    public function index($id_surat)
    {
        $data_surat = Surat::find($id_surat);

        $file_surat = $data_surat->surat_selesai;

        return response()->file(public_path($file_surat));
    }
}
