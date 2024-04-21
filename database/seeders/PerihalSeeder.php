<?php

namespace Database\Seeders;

use App\Models\Perihal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerihalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perihals = [
            [
                "id_kategori_surat" => "1",
                "nama_perihal" => "Permohonan Izin Observasi / PKL / Pinjam Data",
                "nama_tujuan" => "Yth. Kaprodi Kuwat Santoso",
                "alamat_tujuan" => "Politeknik Negeri Semarang",
                "upper_body" => "Dengan ini mohon dibuatkan surat pengantar Permohonan Izin Observasi / PKL / Pinjam Data atas nama mahasiswa di bawah ini :",
                "lower_body" => "Tempat Observasi / PKL / Pinjam Data : <br> Ditujukan : <br> Alamat lengkap & Jelas : <br> Tanggal Pelaksanaan : <br>"
            ]
        ];

        foreach ($perihals as $perihal) {
            Perihal::create($perihal);
        }
    }
}
