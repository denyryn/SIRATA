<?php

namespace Database\Seeders;

use App\Models\Program_Studi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program_studis = [
            ["nama_prodi" => "Teknologi Rekayasa Komputer"],
            ["nama_prodi" => "Teknik Informatika"],
        ];

        foreach ($program_studis as $program_studi) {
            Program_Studi::create($program_studi);
        }
    }
}
