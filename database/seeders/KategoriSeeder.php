<?php

namespace Database\Seeders;

use App\Models\Kategori_Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori_surats = [
            ["nama_kategori" => "Pengantar"],
            ["nama_kategori" => "Permohonan Magang"],
        ];

        foreach ($kategori_surats as $kategori_surat) {
            Kategori_Surat::create($kategori_surat);
        }
    }
}
