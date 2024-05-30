<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Jabatan;
use App\Models\Surat;
use Carbon\Carbon;

Carbon::setLocale('id');

class DownloadSuratController extends Controller
{
    public function index(Request $request, $id_surat)
    {
        // Find the Surat record with the given $id_surat
        $surat = Surat::find($id_surat);

        $riwayat_status_terakhir = $surat->Riwayat()->latest()->first();
        $nama_status_terakhir = $riwayat_status_terakhir->nama_status;

        $tanggal_surat = Carbon::parse($surat->created_at)->translatedFormat('d F Y');

        $pemohons = $surat->Pemohon()->get();

        foreach ($pemohons as $pemohon) {
            if ($pemohon->user->akses == 'mahasiswa') {
                $identitas = $pemohon->user->load('mahasiswa.program_studi')->mahasiswa;
                $data_prodi = $identitas->program_studi;
                $data_pemohons[] = [
                    'identitas' => $identitas,
                    'data_prodi' => $data_prodi
                ];
            } else if ($pemohon->user->akses == 'dosen') {
                $identitas = $pemohon->user->load('dosen.program_studi', 'dosen.jabatan')->dosen;
                $data_prodi = $identitas->program_studi;
                $jabatan = $identitas->jabatan;
                $data_pemohons[] = [
                    'identitas' => $identitas,
                    'data_prodi' => $data_prodi,
                    'jabatan' => $jabatan,
                ];
            }
        }

        //mencari jabatan dari surat
        $dosen_petinggi = Jabatan::where('id_jabatan', $surat->id_jabatan)->first()?->dosen;
        $nama_jabatan = Jabatan::where('id_jabatan', $surat->id_jabatan)->first()?->nama_jabatan;

        $data_surat = [
            'surat' => $surat,
            'tanggal_surat' => $tanggal_surat,
            'nama_status_terakhir' => $nama_status_terakhir,
            'data_pemohons' => $data_pemohons,
            'nama_jabatan' => $nama_jabatan,
            'pemilik_jabatan' => $dosen_petinggi,
        ];

        $no = 1;
        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat['surat']->kategori_Surat->nama_kategori));
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        $pdf_surat = PDF::loadView($template, compact('data_surat', 'no'));
        $pdf_surat->setPaper('a4');

        // Construct the PDF filename based on data_surat
        $nama_surat = (isset($data_surat['data_pemohons'][0]->nim) ? $data_surat['data_pemohons'][0]->nim : "") . "_" . $data_surat['surat']->nama_perihal . "_" . $data_surat['tanggal_surat'] . ".pdf";


        // Save the generated PDF with the constructed filename
        return $pdf_surat->stream($nama_surat);

    }

}
