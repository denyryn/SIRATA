<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Jabatan;

use Carbon\Carbon;

Carbon::setLocale('id');

class SuratDosenController extends Controller
{
    public function read($id_surat)
    {
        // Find the Surat record with the given $id_surat
        $surat = Surat::find($id_surat);

        $riwayat_status_terakhir = $surat->Riwayat()->latest()->first();
        $nama_status_terakhir = $riwayat_status_terakhir->nama_status;

        $tanggal_surat = Carbon::parse($surat->created_at)->translatedFormat('F Y');

        // dd($tanggal_surat);

        $pemohons = $surat->Pemohon()->get();

        foreach ($pemohons as $pemohon) {
            $identitas = $pemohon->user->load('dosen.program_studi')->dosen;
            $data_prodi = $identitas->program_studi;
            $data_pemohons[] = [
                'identitas' => $identitas,
                'data_prodi' => $data_prodi
            ];
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

        // dd($data_surat['pemilik_jabatan']);

        $no = 1;
        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat['surat']->kategori_Surat->nama_kategori));
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        // dd($data_surat);

        $rendered_template = view($template, compact('data_surat', 'no'))->render();
        return view('dosen.surat.preview', compact('data_surat', 'rendered_template'));

    }
}
