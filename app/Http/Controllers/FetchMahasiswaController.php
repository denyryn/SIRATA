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

        $data = json_decode($response->body());

        echo "<pre>";
        
        print_r($data);

        foreach ($data as $postData) {
            // Periksa jika $postData merupakan array atau objek
            if (is_array($postData) || is_object($postData)) {
                // Looping lagi untuk setiap elemen dalam $postData
                foreach ($postData as $key => $value) {
                    // Periksa jika kunci adalah 'NIM'
                    if ($key === 'NIM') {
                        echo "NIM: $value <br>";
                    }
                }
            }
        }        

        die;
    }
}
