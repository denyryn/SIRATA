<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use App\Models\Surat;
use Carbon\Carbon;

Carbon::setLocale('id');

class DownloadSuratController extends Controller
{
    public function index(Request $request, $id_surat)
    {
        $surat = Surat::find($id_surat);

        $tanggal_surat = Carbon::parse($surat->created_at)->format('F Y');

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
                $pemohon = $pemohon->user->dosen;
                $data_pemohons[] = $pemohon;
            }
        }

        $data_surat = [
            'surat' => $surat,
            'tanggal_surat' => $tanggal_surat,
            'data_pemohons' => $data_pemohons,
        ];

        $no = 1;
        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat['surat']->kategori_Surat->nama_kategori));
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        $pdf_surat = Pdf::view($template, compact('data_surat', 'no'));
        // $pdf_surat->format('A4');

        // Construct the PDF filename based on data_surat
        $nama_surat = (isset($data_surat['data_pemohons'][0]->nim) ? $data_surat['data_pemohons'][0]->nim : "") . "_" . $data_surat['surat']->nama_perihal . "_" . $data_surat['tanggal_surat'] . ".pdf";

        // Save the generated PDF with the constructed filename
        return $pdf_surat->download($nama_surat);

    }

}
