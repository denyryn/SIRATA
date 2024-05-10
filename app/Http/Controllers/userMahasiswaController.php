<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Kategori_Surat;

use Carbon\Carbon;

class UserMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $id_user = Session::get('id_user');

        $searchQuery = $request->input('surat_search');

        $data_surat = Surat::whereHas('Pemohon', function ($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })->latest();

        if (!empty($searchQuery)) {
            $data_surat->where(function ($query) use ($searchQuery) {
                $query->where('nama_perihal', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('Kategori_Surat', function ($query) use ($searchQuery) {
                        $query->where('nama_kategori', 'like', '%' . $searchQuery . '%');
                    });
            });
        }

        $data_surat = $data_surat->paginate(10);

        $no = 1;

        foreach ($data_surat as $item) {
            $item->tanggal_buat = Carbon::parse($item->created_at)->format('Y-m-d');
            $item->jam_buat = Carbon::parse($item->created_at)->format('H:i:s');

            // Fetch the latest related Riwayat entry for this Surat
            $riwayat_terbaru = Riwayat::where('id_surat', $item->id_surat)
                ->latest('created_at')
                ->first();

            // Check if $riwayat_terbaru is not null before accessing its properties
            if ($riwayat_terbaru) {
                $item->status_terbaru = $riwayat_terbaru->nama_status;
            } else {
                $item->status_terbaru = 'No Status';
            }

            // Fetch all related Riwayat entries for this Surat
            $riwayat = Riwayat::where('id_surat', $item->id_surat)->get();

            $kategori_surat = Kategori_Surat::find($item->id_kategori_surat);
            $item->nama_kategori = $kategori_surat->nama_kategori;
        }



        // dd($data_surat->nama_kategori);
        // dd($data_surat);
        return view('mahasiswa.dashboard', compact('data_surat', 'no'));
    }

}
