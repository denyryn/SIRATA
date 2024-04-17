<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('auths.welcome');
    }

    public function login()
    {
        return view('auths.login');
    }
}
