<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'), // Hashing password
            'email' => 'admin@example.com',
            'akses' => 'admin',
        ]);

        // Menambahkan data pengguna
        User::create([
            'username' => 'user',
            'password' => Hash::make('user'), // Hashing password
            'email' => 'user@example.com',
            'akses' => 'user',
        ]);
    }
}
