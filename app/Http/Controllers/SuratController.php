<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Status;
use App\Models\Kategori_Surat;
use App\Models\Pemohon;

use Carbon\Carbon;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::query(); // Start with a query builder instance

        $searchQuery = $request->input('surat_search');

        if (!empty($searchQuery)) {
            $query->where(function ($query) use ($searchQuery) {
                $query->where('nama_perihal', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('Kategori_Surat', function ($query) use ($searchQuery) {
                        $query->where('nama_kategori', 'like', '%' . $searchQuery . '%');
                    });
            });
        }

        $data_surat = $query->latest()->paginate(10);

        // Assuming $data_surat is a collection of Surat model instances
        foreach ($data_surat as $item) {
            // Parse the created_at date using Carbon and format it
            $item->tanggal_buat = Carbon::parse($item->created_at)->format('Y-m-d');
            $item->jam_buat = Carbon::parse($item->created_at)->format('H:i:s');

            // Fetch the latest related Riwayat entry for this Surat
            $riwayat_terbaru = Riwayat::where('id_surat', $item->id_surat)
                ->latest('created_at')
                ->first();

            // Set the latest status or 'No Status' if no Riwayat found
            $item->status_terbaru = $riwayat_terbaru ? $riwayat_terbaru->status->nama_status : 'No Status';

            // Fetch all related Riwayat entries for this Surat
            $riwayat = Riwayat::where('id_surat', $item->id_surat)->get();

            // Extract the nama_status from each Riwayat and assign it to $item->riwayat
            $item->riwayat = $riwayat->pluck('nama_status')->toArray(); // Assuming you want an array of status names

            // Fetch the Kategori Surat for this Surat
            $kategori_surat = Kategori_Surat::find($item->id_kategori_surat);
            $item->nama_kategori = $kategori_surat ? $kategori_surat->nama_kategori : 'Not Found';
        }

        return view("admin.surat.index", compact('data_surat'));
    }

    public function edit($id_surat)
    {
        // Find the Surat by ID with its related Kategori_Surat
        $data_surat = Surat::whereHas('pemohon', function ($query) use ($id_surat) {
            $query->where('id_surat', $id_surat);
        })->whereHas('riwayat', function ($query) use ($id_surat) {
            $query->where('id_surat', $id_surat);
        })->with([
                    'riwayat' => function ($query) use ($id_surat) {
                        $query->select('id_status', 'id_surat')->where('id_surat', $id_surat);
                    }
                ])->find($id_surat);

        if (!$data_surat) {
            // Handle case where Surat with $id_surat is not found
            return abort(404, 'Surat not found'); // Or redirect to appropriate error page
        }

        foreach ($data_surat as $item) {
            // Parse the created_at date using Carbon and format it
            $item->tanggal_buat = Carbon::parse($item->created_at)->format('Y-m-d');
            $item->jam_buat = Carbon::parse($item->created_at)->format('H:i:s');

            // Fetch the latest related Riwayat entry for this Surat
            $riwayat_terbaru = Riwayat::where('id_surat', $item->id_surat)
                ->latest('created_at')
                ->first();

            // Set the latest status or 'No Status' if no Riwayat found
            $item->status_terbaru = $riwayat_terbaru ? $riwayat_terbaru->status->nama_status : 'No Status';

            // Fetch all related Riwayat entries for this Surat
            $riwayat = Riwayat::where('id_surat', $item->id_surat)->get();

            // Extract the nama_status from each Riwayat and assign it to $item->riwayat
            $item->riwayat = $riwayat->pluck('nama_status')->toArray(); // Assuming you want an array of status names

            // Fetch the Kategori Surat for this Surat
            $kategori_surat = Kategori_Surat::find($item->id_kategori_surat);
            $item->nama_kategori = $kategori_surat ? $kategori_surat->nama_kategori : 'Not Found';
        }



        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat->kategori_Surat->nama_kategori ?? ''));
        $no = 1;

        if (!view()->exists('surat.template.' . $nama_kategori)) {
            return abort(404, "Template " . $nama_kategori . " tidak ditemukan. Segera hubungi tim IT.");
            // Or redirect to appropriate error page
        }

        $rendered_template = view('surat.template.' . $nama_kategori, compact('no', 'data_surat', 'tanggal_surat', 'pemohons'))->render();

        return view('admin.surat.preview', compact('data_surat', 'status_terbaru', 'riwayat_array', 'nama_kategori_surat', 'rendered_template', 'opsi_status'));
    }

    public function update()
    {

    }


}
