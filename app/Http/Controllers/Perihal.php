<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perihal; // Mengimport model Perihal jika belum dilakukan

class PerihalController extends Controller
{
    // Method untuk menampilkan semua perihal surat
    public function index()
    {
        $perihal = Perihal::all(); // Ambil semua perihal surat dari database
        return view('dashboard.perihal.index', compact('perihal'));
    }

    // Method untuk menyimpan perihal surat yang dipilih oleh pengguna
    public function store(Request $request)
    {
        // Lakukan validasi data yang diterima dari form jika diperlukan
        $request->validate([
            'perihal' => 'required' // Anda dapat menambahkan validasi sesuai kebutuhan
        ]);

        // Lakukan sesuatu dengan data yang diterima, misalnya menyimpan ke database
        // Disini Anda bisa menambahkan logika sesuai dengan kebutuhan aplikasi Anda
        $perihal = new Perihal();
        $perihal->nama_perihal = $request->perihal;
        $perihal->save();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Perihal berhasil disimpan.');
    }
}
