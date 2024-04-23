<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'username' => 'admin',
            'akses' => 'admin',
            'email' => 'rakhayd@gmail.com',
            'password' => bcrypt('123'),
            'remember_token' => Str::random(60)

        ]);

        User::create([
            'username' => 'yuda',
            'akses' => 'mahasiswa',
            'email' => 'user2@example.com',
            'password' => bcrypt('456'),
            'remember_token' => Str::random(60)
        ]);
    }
}
