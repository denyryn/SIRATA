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
                "username" => "43322103",
                "email" => "rakha@gmail.com",
                "password" => bcrypt("123456"),
                "akses" => "mahasiswa",
                "remember_token" => Str::random(60)
            ],
            [
                "username" => "43322106",
                "email" => "yuda@gmail.com",
                "password" => bcrypt("123456"),
                "akses" => "dosen",
                "remember_token" => Str::random(60)
            ],
            
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
