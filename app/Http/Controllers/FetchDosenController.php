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
        ini_set('max_execution_time', 3600);
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
        $no = 1;

        // Memeriksa jika data tidak kosong
        if (!empty($data->data)) {
            foreach ($data->data as $dosen) {

                $NIP = $dosen->NIP;
                $NIDN = $dosen->NIDN;
                $prodi = Program_Studi::whereRaw('LOWER(nama_prodi) = ?', [strtolower($dosen->Homebase_Prodi)])->first();
                $jabatan_default = Jabatan::whereRaw('LOWER(nama_jabatan) = ?', [strtolower("Dosen")])->first();

                if ($dosen) {
                    $duplikat = User::where('username', $NIP)->first();
                    if ($duplikat) {
                        echo "data duplikat ke-" . $no++ . "<br>";
                    } else {
                        $data_user = new User;
                        $data_user->username = $NIP;
                        $data_user->akses = "dosen";
                        $data_user->password = bcrypt("polinesjaya");
                        $data_user->remember_token = Str::random(60);
                        $data_user->email = "";
                        $data_user->save();

                        $data_dosen = new Dosen;
                        $data_dosen->nip = $NIP;
                        $data_dosen->nidn = $NIDN;
                        $data_dosen->id_user = $data_user->id_user;
                        $data_dosen->id_prodi = $prodi->id_prodi;
                        $data_dosen->id_jabatan = $jabatan_default->id_jabatan;
                        $data_dosen->nama_dosen = $dosen->Nama_dosen;
                        $data_dosen->gelar_depan = $dosen->Gelar_depan;
                        $data_dosen->gelar_belakang = $dosen->Gelar_belakang;
                        $data_dosen->save();
                    }
                }
            }
        } else {
            echo "Tidak ada data mahasiswa yang perlu diupdate.";
        }
    }
}
