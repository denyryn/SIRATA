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
                "username" => "adminel",
                "email" => "admin@admin.com",
                "password" => bcrypt("adminel"),
                "akses" => "admin",
                "remember_token" => Str::random(60)
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
