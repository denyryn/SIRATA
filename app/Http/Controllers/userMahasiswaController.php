<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMahasiswaController extends Controller
{
    public function index()
    {
        //get data from db and fetch
        return view('mahasiswa.dashboard');
    }

    public function lacak()
    {
        return view('mahasiswa.lacak_surat');
    }

    public function layanan()
    {
        return view('surat.form');
    }

    public function profile(){
        return view('mahasiswa.profile');
    }
}
