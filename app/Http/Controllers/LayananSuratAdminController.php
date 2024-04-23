<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perihal;
use App\Models\Surat;
use App\Models\Kategori_Surat;
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

        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');
        $nama_kategori = strtolower(str_replace(' ', '_', $data_perihal->kategori_Surat->nama_kategori ?? ''));
        $no = 1;
        $tanggal_sekarang = Carbon::now()->translatedFormat('F Y');
        $template = 'surat.template.' . $nama_kategori;

        if (!view()->exists($template)) {
            abort(404, __('Template not found.'));
        }
        $rendered_template = view($template, compact('no', 'data_perihal', 'tanggal_sekarang'))->render();
        return view('surat.form');
    }

    public function store(Request $request)
    {
        $data_surat = new surat;
        $data_surat->nama_perihal = $request->nama_perihal;
        $data_surat->nama_tujuan = $request->nama_tujuan;
        $data_surat->alamat_tujuan = $request->alamat_tujuan;
        $data_surat->upper_body = $request->upper_body;
        $data_surat->lower_body = $request->lower_body;
        $data_surat->save();
        return redirect()->route("admin.perihal");
    }
}
