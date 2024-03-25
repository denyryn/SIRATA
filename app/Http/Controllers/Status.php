<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat; // Pastikan Anda mengganti ini dengan model yang sesuai dengan status surat Anda

class Status extends Controller
{
    public function index()
    {
        // Misalkan Anda memiliki data surat tersimpan dalam model Surat
        // Anda dapat mengambil data surat dan memuatnya ke dalam view status.blade.php

        $surat = Surat::all(); // Mengambil semua data surat dari model Surat
        return view('status', compact('surat')); // Mengirim data surat ke view
    }
}
