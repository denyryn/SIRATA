<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananSuratController extends Controller
{
    public function index()
    {
        return view('surat.index');
    }

    public function create()
    {
        // take data from nama kategori and return it to view using ('....').nama_kategori
        // ini buat nampilin halaman surat yang mau diisi di mahasiswa
        return view('surat.index');
    }
}
