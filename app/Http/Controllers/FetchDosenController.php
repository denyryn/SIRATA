<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Program_Studi;
use App\Models\Jabatan;

class FetchDosenController extends Controller
{
    public function index(Request $request)
    {
        ini_set('max_execution_time', 36000);

        $api_token = env('API_TOKEN');
        $api_url = env("DOSEN_API_URL");

        // Membuat header dengan token API
        $headers = [
            'Authorization' => 'Bearer ' . $api_token,
            'Accept' => 'application/json', // Menetapkan tipe konten yang diterima sebagai JSON
        ];

        // Melakukan permintaan ke API dengan menyertakan header
        $response = Http::withHeaders($headers)->get($api_url);

        // Mengambil body respons dan mengubahnya menjadi objek PHP
        $data = json_decode($response->body());

        //inisialisasi awal total duplikat
        $total_duplikat = 0;

        // Memeriksa jika data tidak kosong
        if (empty($data->data)) {
            return response()->json([
                'error' => true,
                'message' => 'Tidak ada respon dari API. Pastikan token API benar dan koneksi internet stabil.',
            ], 422);
        } else {
            foreach ($data->data as $dosen) {
                $dosen = (object) array_change_key_case((array) $dosen, CASE_LOWER);

                $nip = $dosen->nip;
                $nidn = $dosen->nidn;
                $prodi = Program_Studi::whereRaw('LOWER(nama_prodi) = ?', [strtolower($dosen->homebase_prodi)])->first();

                if ($dosen) {
                    $duplikat = User::where('username', $nip)->first();
                    if ($duplikat) {
                        $total_duplikat++;
                    } else {
                        $data_user = new User;
                        $data_user->username = $nip;
                        $data_user->akses = "dosen";
                        $data_user->password = bcrypt("polinesjaya");
                        $data_user->remember_token = Str::random(60);
                        $data_user->email = "";
                        $data_user->save();

                        $data_dosen = new Dosen;
                        $data_dosen->nip = $nip;
                        $data_dosen->nidn = $nidn;
                        $data_dosen->id_user = $data_user->id_user;
                        $data_dosen->id_prodi = $prodi->id_prodi;
                        $data_dosen->nama_dosen = $dosen->nama_dosen;
                        $data_dosen->gelar_depan = $dosen->gelar_depan;
                        $data_dosen->gelar_belakang = $dosen->gelar_belakang;
                        $data_dosen->save();
                    }
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Data dosen berhasil ditambahkan dengan total duplikat ' . $duplikat ? $total_duplikat + 1 : $total_duplikat,
            ], 201);
        }
    }
}
