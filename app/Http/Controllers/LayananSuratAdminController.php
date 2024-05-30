<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perihal;
use App\Models\Surat;
use App\Models\Kategori_Surat;
use App\Models\User;
use App\Models\Riwayat;
use App\Models\Pemohon;
use App\Models\Status;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Jabatan;

use Carbon\Carbon;

Carbon::setLocale('id');

class LayananSuratAdminController extends Controller
{
    public function index()
    {
        $data_perihals = perihal::with('Kategori_Surat')->paginate(10);

        $data_perihal = [];

        foreach ($data_perihals as $perihal) {
            $nama_kategori = strtolower(str_replace(' ', '_', $perihal->kategori_Surat->nama_kategori ?? ''));

            if (view()->exists('surat.template.' . $nama_kategori)) {
                // Include data for this $perihal since the view exists
                $data_perihal[] = [
                    'perihal' => $perihal,
                    'nama_kategori' => $nama_kategori,
                ];
            }
        }
        return view('surat.index', compact('data_perihal'));
    }

    public function create($id_perihal)
    {
        $data_perihal = perihal::with('Kategori_Surat')->find($id_perihal);

        if (!$data_perihal) {
            // Handle case where perihal with $id_perihal is not found
            abort(404, __('Perihal not found.')); // Or redirect to appropriate error page
        }

        $no = 1;
        $tanggal_sekarang = Carbon::now()->translatedFormat('d F Y');

        $nama_kategori = strtolower(str_replace(' ', '_', $data_perihal->kategori_Surat->nama_kategori ?? ''));
        $template = 'surat.template.' . $nama_kategori;
        $form = 'surat.forms.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }

        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $jabatans = Jabatan::with('Dosen')->get();
        $peruntukkan = $data_perihal->kategori_Surat->peruntukkan;

        $rendered_template = view($template, compact('no', 'data_perihal', 'tanggal_sekarang'))->render();
        return view($form, compact('data_perihal', 'jabatans', 'peruntukkan', 'rendered_template', 'mahasiswas', 'dosens'));
    }

    public function store(Request $request)
    {
        $status_awal = 'Pending';
        $count = $request->input('count');

        $request->validate([
            'lampiran' => 'nullable|mimes:pdf',
        ]);

        $data_surat = new surat;
        // $data_surat->id_user = $request->id_user;
        $data_surat->id_kategori_surat = $request->id_kategori_surat;
        $data_surat->id_jabatan = $request->id_jabatan;
        $data_surat->nama_perihal = $request->nama_perihal;
        $data_surat->nama_tujuan = $request->nama_tujuan;
        $data_surat->alamat_tujuan = $request->alamat_tujuan;
        $data_surat->upper_body = $request->upper_body;
        $data_surat->lower_body = $request->lower_body;

        if ($request->hasFile('lampiran')) {
            $file_lampiran = $request->file('lampiran');
            $filename = 'lampiran_' . $data_surat->id_surat . '_' . $data_surat->nama_perihal . '_' . $data_surat->nama_kategori . '_' . time() . '.' . $file_lampiran->getClientOriginalExtension();
            $path = "uploads/lampiran/";
            $file_lampiran->move($path, $filename);
            $data_surat->lampiran = $path . $filename;
        }

        $data_surat->id_user_pembuat = $request->input("id_user1");
        $data_surat->save();

        for ($i = 1; $i <= $count; $i++) {
            if ($request->has("id_user$i")) {
                $id_user = $request->input("id_user$i");

                if ($i == 1) {
                    $data_surat->id_user_pembuat = $id_user;
                }

                $data_pemohon = new pemohon;
                $data_pemohon->id_user = $id_user;
                $data_pemohon->id_surat = $data_surat->id_surat;
                $data_pemohon->save();
            }
        }

        $data_riwayat = new riwayat;
        $data_riwayat->nama_status = $status_awal;
        $data_riwayat->id_surat = $data_surat->id_surat;
        $data_riwayat->save();

        return redirect()->route("admin.surat");
    }
}
