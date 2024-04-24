<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Status;

use Carbon\Carbon;

class SuratController extends Controller
{
    public function index()
    {
        $data_surat = Surat::paginate(10);

        $data_surat->each(function ($item) {
            $item->tanggal_buat = Carbon::parse($item->created_at)->format('Y-m-d');
            $item->jam_buat = Carbon::parse($item->created_at)->format('H:i:s');

            // Fetch the latest related Riwayat entry for this Surat
            $riwayat_terbaru = Riwayat::where('id_surat', $item->id_surat)
                ->latest('created_at')
                ->first();

            $item->status_terbaru = $riwayat_terbaru->status->nama_status;

            // Fetch all related Riwayat entries for this Surat
            $riwayat = Riwayat::where('id_surat', $item->id_surat)->get();

            // Extract the nama_status from each Riwayat and assign it to $item->riwayat
            $item->riwayat = $riwayat->pluck('Status', 'nama_status');
        });




        return view("admin.surat.index", compact('data_surat'));
    }
}
