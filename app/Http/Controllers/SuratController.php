<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Status;
use App\Models\Kategori_Surat;
use App\Models\Pemohon;
use App\Models\Program_Studi;

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

    public function edit(Request $request, $id_surat)
    {
        $status_proses = Status::where('nama_status', 'Diproses')->first('id_status');

        // Find the Surat record with the given $id_surat
        $surat = Surat::find($id_surat);

        $riwayat_status_terakhir = $surat->Riwayat()->latest()->first();
        $nama_status_terakhir = $riwayat_status_terakhir->Status->nama_status;

        if ($nama_status_terakhir != "Diproses" && $nama_status_terakhir != "Disetujui") {
            $data_riwayat = new Riwayat;
            $data_riwayat->id_status = $status_proses->id_status;
            $data_riwayat->id_surat = $surat->id_surat;
            $data_riwayat->save();
        }

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
            'nama_status_terakhir' => $nama_status_terakhir,
            'data_pemohons' => $data_pemohons,
        ];

        $no = 1;
        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat['surat']->kategori_Surat->nama_kategori));
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        // dd($data_surat);

        $rendered_template = view($template, compact('data_surat', 'no'))->render();
        return view('admin.surat.preview', compact('data_surat', 'nama_status_terakhir', 'rendered_template'));

    }

    public function update(Request $request, $id_surat)
    {
        $status_disetujui = Status::where('nama_status', 'Disetujui')->first('id_status');

        // Find the Surat record with the given $id_surat
        $data_surat = Surat::find($id_surat);
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->update();

        $data_riwayat = new Riwayat;
        $data_riwayat->id_status = $status_disetujui->id_status;
        $data_riwayat->id_surat = $data_surat->id_surat;
        $data_riwayat->save();

        return redirect(route('admin.surat'));
    }

    public function reject($id)
    {

    }


}
