<?php

namespace Database\Seeders;

use App\Models\User;
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
                "akses" => "admin"
            ],
            [
                "username" => "59832171812",
                "email" => "wahyusulistyo@outlook.com",
                "password" => bcrypt("123456"),
                "akses" => "dosen"
            ],
            [
                "username" => "43322106",
                "email" => "denyryn@outlook.com",
                "password" => bcrypt("123456"),
                "akses" => "mahasiswa"
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
