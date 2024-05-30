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

        $total_duplikat = 0;

        // Memeriksa jika data tidak kosong
        if (empty($data->data)) {
            return response()->json([
                'error' => true,
                'message' => 'Tidak ada respon dari API. Pastikan token API benar dan koneksi internet stabil.'
            ], 422);
        } else {
            // Looping melalui setiap mahasiswa dalam data
            foreach ($data->data as $mahasiswa) {
                $mahasiswa = (object) array_change_key_case((array) $mahasiswa, CASE_LOWER);

                //menghapus tanda titik pada nim
                $nim = str_replace('.', '', $mahasiswa->nim);
                $prodi = Program_Studi::whereRaw('LOWER(nama_prodi) = ?', [strtolower($mahasiswa->program_studi)])->first();
                $dosen_pembimbing = Dosen::where('nip', $mahasiswa->nip_dosen_wali)->first();

                if ($mahasiswa) {
                    $duplikat = User::where('username', $nim)->first();
                    if ($duplikat) {
                        $total_duplikat++;
                    } else {
                        // If user with nim doesn't exist, create new user and student record
                        $data_user = new User;
                        $data_user->username = $nim;
                        $data_user->akses = "mahasiswa";
                        $data_user->password = bcrypt("polinesjaya");
                        $data_user->remember_token = Str::random(60);
                        $data_user->email = $mahasiswa->email;
                        $data_user->save();

                        $data_mahasiswa = new Mahasiswa;
                        $data_mahasiswa->nim = $nim;
                        $data_mahasiswa->id_user = $data_user->id_user;
                        $data_mahasiswa->id_prodi = $prodi->id_prodi;
                        $data_mahasiswa->id_dosen_pembimbing = ((!is_null($dosen_pembimbing) && !is_null($dosen_pembimbing->id_dosen)) ? $dosen_pembimbing->id_dosen : null);
                        $data_mahasiswa->nama_mahasiswa = $mahasiswa->nama;
                        $data_mahasiswa->save();
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa berhasil ditambahkan dengan total duplikat ' . ($duplikat ? $total_duplikat + 1 : $total_duplikat),
            ], 201);
        }
    }
}
