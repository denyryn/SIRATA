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
                "lower_body" => "Tempat Observasi / PKL / Pinjam Data : <br>
Ditujukan : <br>
Alamat lengkap & Jelas :<br>
Tanggal Pelaksanaan : <br>"
            ],

            [
                "id_kategori_surat" => "2",
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

            [
                "id_kategori_surat" => "3",
                "nama_perihal" => "Permohonan Pinjam Ruang",
                "nama_tujuan" => "Yth. Kepala Sub Bagian Umum",
                "alamat_tujuan" => "Polines",
                "upper_body" => "Sehubungan dengan kegiatan Kuliah Tamu Prodi D3 Teknik Informatika dan Prodi STr Teknologi Rekayasa Komputer Jurusan Teknik Elektro, kami mohon izin untuk meminjam ruang pada :",
                "lower_body" => '<table style="padding-left: 1cm" class="tabel-rata">
            <tr>
                <td>
                    Hari/Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tanggalContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Jam
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="jam_mulaiContent">

                    </span>
                    <span id="jam_selesaiContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Tempat
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tempatContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Acara
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="acaraContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Perlengkapan
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="perlengkapanContent">

                    </span>
                </td>
            </tr>
        </table>

        <div style="padding-top: 0.1cm;"></div>

        <div>
            <div>
                <p id="lower_body_partContent">
Demikian permohonan kami, atas izin dan kesempatan yang diberikan diucapkan Terima Kasih.
                </p>
            </div>
        </div>'
            ],

            [
                "id_kategori_surat" => "4",
                "nama_perihal" => "Permohonan Surat Tugas",
                "nama_tujuan" => "Yth. Ketua Jurusan Elektro",
                "alamat_tujuan" => "Politeknik Negeri Semarang",
                "upper_body" => '<p id="hormatContent">
            Dengan Hormat, <br>
            Sehubungan dengan kunjungan industri dalam rangka perintisan kerjasama dengan dunia industri yang akan
            diselenggarakan pada:
        </p>

        <table class="tabel-rata">
            <tr>
                <td>
                    Hari/Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tanggalContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Waktu
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="jam_mulaiContent">

                    </span>
                    <span id="jam_selesaiContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Tempat
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tempatContent">

                    </span>
                </td>
            </tr>
        </table>

        <p id="maksudContent">
            Kami bermaksud untuk mengajukan permohonan surat tugas kepada pimpinan Politeknik Negeri Semarang dengan rincian
            dosen sebagai berikut:
        </p>',
                "lower_body" => 'Demikian surat permohonan ini kami buat. Terima kasih atas bantuan dan perhatiannya.'
            ],

            [
                "id_kategori_surat" => "5",
                "nama_perihal" => "Permohonan Izin Kunjungan Kuliah Kerja Lapangan",
                "nama_tujuan" => "Yth. Pimpinan ....",
                "alamat_tujuan" => "Jl. .....",
                "upper_body" => 'Sehubungan dengan akan dilaksanakan Kuliah Kerja Lapangan (KKL) Program Studi D3 Teknik Informatika dan D4 Teknologi Rekayasa Komputer Politeknik Negeri Semarang, maka kami mengajukan permohonan izin untuk melaksanakan kunjungan Kuliah Kerja Lapangan di ...',
                "lower_body" => '<p id="lower_body_part1Content">
Adapun rencana pelaksanaannya adalah:
        </p>

        <table style="padding-left: 1cm" class="tabel-rata">
            <tr>
                <td>
                    Hari/Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tanggalContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Waktu
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="jam_mulaiContent">

                    </span>
                    <span>
                        s.d
                    </span>
                    <span id="jam_selesaiContent">

                    </span>
                    <span>
                        WIB
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Peserta
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="pesertaContent">

                    </span>
                </td>
            </tr>
        </table>

        <div style="padding-top: 0.1cm;"></div>

        <p id="lower_body_part2Content">
Demikian permohonan kami, atas izin dan kesempatan yang diberikan diucapkan Terima Kasih.
        </p>'
            ],

            [
                "id_kategori_surat" => "6",
                "nama_perihal" => "Permohonan Surat Tugas dan SPPD",
                "nama_tujuan" => "Yth. Ketua Jurusan Elektro",
                "alamat_tujuan" => "Politeknik Negeri Semarang",
                "upper_body" => '<p id="hormatContent"><br>
Dengan Hormat,<br>
Sehubungan dengan kunjungan industri dalam rangka perintisan kerjasama dengan dunia industri yang akan diselenggarakan pada:
        </p>

        <table class="tabel-rata">
            <tr>
                <td>
                    Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tanggal_mulaiContent">

                    </span>
					<span>
s.d
                    </span>
					<span id="tanggal_selesaiContent">

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    Lokasi
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tempatContent">

                    </span>
                </td>
            </tr>
        </table>

        <p id="maksudContent">
            Maka kami mengajukan permohonan untuk dapat diberikan:<br>
            1. Surat Tugas<br>
            2. SPPD
        </p>',
                "lower_body" => 'Demikian permohonan ini kami sampaikan. Atas ketersediaannya, diucapkan terima kasih.'
            ],
        ];

        foreach ($perihals as $perihal) {
            Perihal::create($perihal);
        }
    }
}
