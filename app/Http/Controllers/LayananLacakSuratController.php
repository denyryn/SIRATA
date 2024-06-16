<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;

use Carbon\Carbon;

Carbon::setLocale('id');

class LayananLacakSuratController extends Controller
{
    public function index($id_surat)
    {
        $data_surat = Surat::find($id_surat);
        $tanggal_surat = Carbon::parse($data_surat->created_at)->translatedFormat('d M Y');

        $riwayats = $data_surat->riwayat;

        foreach ($riwayats as $riwayat) {
            $created_at = Carbon::parse($riwayat->created_at);
            $formatted_date = $created_at->format('j M Y, H:i');

            $riwayat->waktu_status = $formatted_date;
        }

        $data_surat = [
            'surat' => $data_surat,
            'tanggal_surat' => $tanggal_surat,
            'riwayats' => $riwayats
        ];

        return view('mahasiswa.surat.lacak_surat', compact('data_surat'));
    }
}
