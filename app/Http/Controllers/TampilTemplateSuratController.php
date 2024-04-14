<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TampilTemplateSuratController extends Controller
{
    public function build()
    {
        return view('surat.template.buildone');
    }

    public function allinone()
    {
        return view('surat.template.allinone');
    }
}
