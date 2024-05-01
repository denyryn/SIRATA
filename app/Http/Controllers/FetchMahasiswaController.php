<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\Program_Studi;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;

class FetchMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        ini_set('max_execution_time', 3600);
        $api_token = env('API_TOKEN');
        $api_url = env("MAHASISWA_API_URL");

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
            // Looping melalui setiap mahasiswa dalam data
            foreach ($data->data as $mahasiswa) {

                //menghapus tanda titik pada nim
                $NIM = str_replace('.', '', $mahasiswa->NIM);
                $prodi = Program_Studi::whereRaw('LOWER(nama_prodi) = ?', [strtolower($mahasiswa->Program_studi)])->first();
                $dosen_pembimbing = Dosen::where('nip', $mahasiswa->NIP_dosen_wali)->first();

                if ($mahasiswa) {
                    $duplikat = User::where('username', $NIM)->first(); // Check if user with the NIM already exists
                    if ($duplikat) {
                        echo "data duplikat ke-" . $no++ . "<br>";
                    } else {
                        // If user with NIM doesn't exist, create new user and student record
                        $data_user = new User;
                        $data_user->username = $NIM;
                        $data_user->akses = "mahasiswa";
                        $data_user->password = bcrypt("polinesjaya");
                        $data_user->remember_token = Str::random(60);
                        $data_user->email = $mahasiswa->Email;
                        $data_user->save();

                        $data_mahasiswa = new Mahasiswa;
                        $data_mahasiswa->nim = $NIM;
                        $data_mahasiswa->id_user = $data_user->id_user;
                        $data_mahasiswa->id_prodi = $prodi->id_prodi;
                        $data_mahasiswa->id_dosen_pembimbing = ((!is_null($dosen_pembimbing) && !is_null($dosen_pembimbing->id_dosen)) ? $dosen_pembimbing->id_dosen : null);
                        $data_mahasiswa->nama_mahasiswa = $mahasiswa->Nama;
                        $data_mahasiswa->save();
                    }
                }
            }
        } else {
            echo "Tidak ada data mahasiswa yang perlu diupdate.";
        }
    }
}
