<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userMahasiswa extends Controller
{
    public function index () {
        //get data from db and fetch
        return view('mahasiswa.dashboard');
    }

    public function lacak () {
        return view('mahasiswa.lacak');
    }
}
