<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "username" => "43322100",
                "email" => "admin@admin.com",
                "password" => bcrypt("123456"),
                "akses" => "admin",
                "remember_token" => Str::random(60)
            ],
            [
                "username" => "59832171812",
                "email" => "wahyusulistyo@outlook.com",
                "password" => bcrypt("123456"),
                "akses" => "dosen",
                "remember_token" => Str::random(60)
            ],
            [
                "username" => "43322106",
                "email" => "denyryn@outlook.com",
                "password" => bcrypt("123456"),
                "akses" => "mahasiswa",
                "remember_token" => Str::random(60)
            ],
            [
                "username" => "43322103",
                "email" => "fatika@outlook.com",
                "password" => bcrypt("123456"),
                "akses" => "mahasiswa",
                "remember_token" => Str::random(60)
            ]
        ];

        $mahasiswas = [
            [
                "id_user" => "3",
                "nim" => "43322106",
                "id_kelas" => "2",
                "nama_mahasiswa" => "Deny Rianto"
            ],
            [
                "id_user" => "4",
                "nim" => "43322103",
                "id_kelas" => "2",
                "nama_mahasiswa" => "Aulia Fatika Rahmadani"
            ]
        ];

        $dosens = [
            [
                "id_user" => "2",
                "nip" => "59832171812",
                "nama_dosen" => "Wahyu Sulistyo"
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }

        foreach ($dosens as $dosen) {
            Dosen::create($dosen);
        }
    }
}
