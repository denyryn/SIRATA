<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatans = [
            ["nama_jabatan" => "Ketua Jurusan Elektro"],
            ["nama_jabatan" => "Kepala Program Studi Teknologi Rekayasa Komputer"],
            ["nama_jabatan" => "Kepala Program Studi Teknik Elektro"],
            ["nama_jabatan" => "Wali kelas"],


        ];

        Jabatan::insert($jabatans);
    }
}
