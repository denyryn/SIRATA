<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelases = [
            [
                "id_prodi" => "1",
                "nama_kelas" => "TI-2A",
            ],
            [
                "id_prodi" => "1",
                "nama_kelas" => "TI-2B",
            ],
        ];

        foreach ($kelases as $kelas) {
            Kelas::create($kelas);
        }
    }
}
