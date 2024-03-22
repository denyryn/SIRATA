<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    public function index() {
        return view('index.welcome');
    }

    public function login(){
        return view('index.login');
    }
}
