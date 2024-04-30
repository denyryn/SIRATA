<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Http;

class FetchMahasiswaController extends Controller
{
    public function store()
    {
        $api_token = env('API_TOKEN');
        $api_url = env("API_URL");

        // Membuat header dengan token API
        $headers = [
            'Authorization' => 'Bearer ' . $api_token,
            'Accept' => 'application/json', // Menetapkan tipe konten yang diterima sebagai JSON
        ];

        // Melakukan permintaan ke API dengan menyertakan header
        $response = Http::withHeaders($headers)->get($api_url);

        // Mengambil body respons dan mengubahnya menjadi objek PHP
        $data = json_decode($response->body());

        // Memeriksa jika data tidak kosong
        if (!empty($data->data)) {
            // Looping melalui setiap mahasiswa dalam data
            foreach ($data->data as $mahasiswa) {
                // Menampilkan NIM saja dari setiap mahasiswa
                echo "NIM: $mahasiswa->NIM <br>";
            }
        } else {
            echo "Tidak ada data mahasiswa.";
        }
    }
}
