<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function create()
    {
        return view('surat.template.build');
    }
}
