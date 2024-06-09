<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;
use App\Models\Riwayat;
use App\Models\Status;
use App\Models\Kategori_Surat;
use App\Models\Jabatan;
use App\Models\Pemohon;
use App\Models\Program_Studi;

use Carbon\Carbon;

Carbon::setLocale('id');

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
        foreach ($data_surat as $surat) {
            // Parse the created_at date using Carbon and format it
            $surat->tanggal_buat = Carbon::parse($surat->created_at)->format('j M Y');
            $surat->jam_buat = Carbon::parse($surat->created_at)->format('H:i:s');

            // Fetch the latest related Riwayat entry for this Surat
            $riwayat_terbaru = Riwayat::where('id_surat', $surat->id_surat)
                ->latest('created_at')
                ->first();

            // Set the latest status or 'No Status' if no Riwayat found
            $surat->status_terbaru = $riwayat_terbaru ? $riwayat_terbaru->nama_status : 'No Status';

            // Fetch all related Riwayat entries for this Surat
            $riwayat = Riwayat::where('id_surat', $surat->id_surat)->get();

            // Extract the nama_status from each Riwayat and assign it to $item->riwayat
            // dd($surat->riwayat);

            // $pemohon = Pemohon::where('id_surat', $surat->id_surat)->first()->user->username;
            $pemohon = $surat->user->username;
            $surat->pemohon = $pemohon;


            // Fetch the Kategori Surat for this Surat
            $kategori_surat = Kategori_Surat::find($surat->id_kategori_surat);
            $surat->nama_kategori = $kategori_surat ? $kategori_surat->nama_kategori : 'Not Found';
        }

        return view("admin.surat.index", compact('data_surat'));
    }

    public function edit(Request $request, $id_surat)
    {
        $status_proses = 'Diproses - Admin';

        // Find the Surat record with the given $id_surat
        $surat = Surat::find($id_surat);

        $riwayat_status_terakhir = $surat->riwayat->last();
        $nama_status_terakhir = $riwayat_status_terakhir->nama_status;

        $statusDiproses = str_contains(strtolower($nama_status_terakhir), 'diproses');
        $statusDisetujui = str_contains(strtolower($nama_status_terakhir), 'disetujui');
        $statusDitolak = str_contains(strtolower($nama_status_terakhir), 'ditolak');

        if (!$statusDiproses && !($statusDisetujui || $statusDitolak)) {
            $data_riwayat = new Riwayat;
            $data_riwayat->nama_status = $status_proses;
            $data_riwayat->id_surat = $surat->id_surat;
            $data_riwayat->save();
        }


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

        $jabatan_trk = Jabatan::with('dosen')
            ->where('nama_jabatan', 'like', '%' . "rekayasa komputer" . '%')
            ->first();

        $jabatan_ti = Jabatan::with('dosen')
            ->where('nama_jabatan', 'like', '%' . "teknik informatika" . '%')
            ->first();

        $data_surat = [
            'surat' => $surat,
            'tanggal_surat' => $tanggal_surat,
            'nama_status_terakhir' => $nama_status_terakhir,
            'data_pemohons' => $data_pemohons ?? [],
            'nama_jabatan' => $nama_jabatan ?? '',
            'pemilik_jabatan' => $dosen_petinggi ?? null,
            'kaprodi-trk_statis' => $jabatan_trk ?? null,
            'kaprodi-ti_statis' => $jabatan_ti ?? null,
        ];

        $no = 1;
        $nama_kategori = strtolower(str_replace(' ', '_', $data_surat['surat']->kategori_Surat->nama_kategori));
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        $rendered_template = view($template, compact('data_surat', 'no'))->render();
        return view('admin.surat.preview', compact('data_surat', 'nama_status_terakhir', 'rendered_template'));
    }

    public function update(Request $request, $id_surat)
    {
        $status_lanjutan = 'Diproses - YBS';

        // Find the Surat record with the given $id_surat
        $data_surat = Surat::find($id_surat);
        $data_surat->nomor_surat = $request->nomor_surat;
        $data_surat->update();

        $data_riwayat = new Riwayat;
        $data_riwayat->nama_status = $status_lanjutan;
        $data_riwayat->id_surat = $data_surat->id_surat;
        $data_riwayat->save();

        return redirect(route('admin.surat'));
    }

    public function approve(Request $request, $id_surat)
    {
        $data_surat = Surat::find($id_surat);
        $nama_status_terakhir = $data_surat->riwayat->last()->nama_status;

        $request->validate([
            'surat_selesai' => 'required|mimes:pdf',
        ]);

        $file_surat = $request->file('surat_selesai');
        $filename = preg_replace('/[^\w]/', '_', $data_surat->id_surat . '_' . $data_surat->nama_perihal . '_' . $data_surat->nama_kategori . '_' . time() . '.' . $file_surat->getClientOriginalExtension());
        $path = "uploads/surat_selesai/";
        $file_surat->move($path, $filename);

        $data_surat->surat_selesai = $path . $filename;
        $data_surat->save();

        if (!(str_contains(strtolower($nama_status_terakhir), 'disetujui'))) {
            $status_setuju = 'Disetujui';

            $data_riwayat = new Riwayat;
            $data_riwayat->nama_status = $status_setuju;
            $data_riwayat->id_surat = $data_surat->id_surat;
            $data_riwayat->save();
        }

        return redirect(route('admin.surat'));
    }

    public function reject(Request $request, $id_surat)
    {
        $status_ditolak = 'Ditolak - Admin';

        // Find the Surat record with the given $id_surat
        $data_surat = Surat::find($id_surat);

        $data_riwayat = new Riwayat;
        $data_riwayat->nama_status = $status_ditolak;
        $data_riwayat->keterangan_status = $request->keterangan_status;
        $data_riwayat->id_surat = $data_surat->id_surat;
        $data_riwayat->save();

        return redirect(route('admin.users.send_mail', compact('id_surat')));
    }

}
