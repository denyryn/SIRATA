<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => '43322106',
            'email' => 'denyryn@outlook.com',
            'password' => Hash::make('sirata'),
            'akses' => 'mahasiswa'
        ]);

        DB::table('users')->insert([
            'username' => '001001',
            'email' => 'admin@admin.com',
            'password' => Hash::make('sirata'),
            'akses' => 'admin'
        ]);
    }
}
