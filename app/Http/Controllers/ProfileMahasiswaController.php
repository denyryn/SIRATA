<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProfileMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswa = Session::get('data_mahasiswa');
        return view("mahasiswa.profile", compact("data_mahasiswa"));
    }
}
