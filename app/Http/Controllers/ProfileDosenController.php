<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileDosenController extends Controller
{
    public function index()
    {
        $data_dosen = Session::get('data_dosen');
        return view("dosen.profile", compact("data_dosen"));
    }
}
