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
            ],
            [
                "id_kategori_surat" => "1",
                "nama_perihal" => "Permohonan Magang",
                "nama_tujuan" => "Yth. Direktur PT. Educa Sisfomedia Indonesia",
                "alamat_tujuan" => "Jalan Gilingrejo No.10, Gendongan, Tingkir, Salatiga",
                "upper_body" => "Guna memenuhi kurikulum Jurusan Teknik Elektro, Prodi D3 Teknik Informatika dengan hormat disampaikan permohonan kesempatan melaksanakan Magang di PT.Educa Sisfomedia Indonesia selama 6 (enam) bulan, sebanyak 1 (satu) orang mahasiswa sebagai berikut :",
                "lower_body" => "Mohon dapat memberikan konfirmasinya dalam waktu yang tidak terlalu lama, ditujukan kepada Ketua Jurusan Teknik Elektro Politeknik Negeri Semarang.<br>
                                    <br>
                                    Rencana Magang tersebut mulai tanggal 1 Agustus 2022 s.d 31 januari 2023.<br>
                                    <br>
                                    Demikian, atas ketersediaan dan kerjasamanya diucapkan terimakasih."
            ],
        ];

        foreach ($perihals as $perihal) {
            Perihal::create($perihal);
        }
    }
}
