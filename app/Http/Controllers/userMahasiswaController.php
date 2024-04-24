<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Surat;
use App\Models\Riwayat;

use Carbon\Carbon;

class UserMahasiswaController extends Controller
{
    public function index()
    {
        $id_user = Session::get('id_user');

        $data_surat = Surat::whereHas('Pemohon', function ($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })->paginate(10);

        $no = 1;

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

        // dd($data_surat);
        return view('mahasiswa.dashboard', compact('data_surat', 'no'));
    }

    public function lacak()
    {
        return view('mahasiswa.lacak_surat');
    }
}
