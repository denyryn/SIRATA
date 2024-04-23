<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Surat;
use Illuminate\Http\Request;
use App\Models\perihal;
use Carbon\Carbon;

Carbon::setLocale('id');

class perihalController extends Controller
{
    public function index(Request $request)
    {
        $data_perihal = perihal::paginate(5);

        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');

        return view("admin.perihal.index", compact('data_perihal', 'opsi_kategori'));
    }

    public function create()
    {
        $opsi_kategori = Kategori_Surat::pluck('nama_kategori', 'id_kategori_surat');
        $tanggal_sekarang = Carbon::now()->translatedFormat('F Y');
        $no = 1;
        $rendered_template = view('surat/template/build', compact('no', 'tanggal_sekarang'))->render();
        return view('admin.perihal.create', compact('opsi_kategori', 'rendered_template'));
    }

    public function store(Request $request)
    {
        $data_perihal = new perihal;
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->nama_tujuan = $request->nama_tujuan;
        $data_perihal->alamat_tujuan = $request->alamat_tujuan;
        $data_perihal->upper_body = $request->upper_body;
        $data_perihal->lower_body = $request->lower_body;
        $data_perihal->save();
        return redirect()->route("admin.perihal");
    }

    public function read($id_perihal)
    {
        $data_perihal = perihal::with('Kategori_Surat')->find($id_perihal);

        if (!$data_perihal) {
            // Handle case where perihal with $id_perihal is not found
            return abort(404, 'Perihal not found'); // Or redirect to appropriate error page
        }

        $nama_kategori = strtolower(str_replace(' ', '_', $data_perihal->kategori_Surat->nama_kategori ?? ''));
        $no = 1;
        $tanggal_sekarang = Carbon::now()->translatedFormat('F Y');

        if (!view()->exists('surat.template.' . $nama_kategori)) {
            return abort(404, "Template " . $nama_kategori . " tidak ditemukan. Segera hubungi tim IT.");            // Or redirect to appropriate error page
        }

        $rendered_template = view('surat.template.' . $nama_kategori, compact('no', 'data_perihal', 'tanggal_sekarang'))->render();
        return view('admin.perihal.detail', compact('no', 'data_perihal', 'rendered_template'));
    }

    public function edit(Request $request, $id_perihal)
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
        return view('admin.perihal.edit', compact('no', 'data_perihal', 'rendered_template', 'opsi_kategori'));
    }

    public function update(Request $request, $id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->nama_perihal = $request->nama_perihal;
        $data_perihal->id_kategori_surat = $request->id_kategori_surat;
        $data_perihal->nama_tujuan = $request->nama_tujuan;
        $data_perihal->alamat_tujuan = $request->alamat_tujuan;
        $data_perihal->upper_body = $request->upper_body;
        $data_perihal->lower_body = $request->lower_body;
        $data_perihal->update();
        return redirect(route('admin.perihal'));
    }

    public function delete($id_perihal)
    {
        $data_perihal = perihal::find($id_perihal);
        $data_perihal->delete();

        return redirect(route('admin.perihal'))->with('success', 'perihal has been deleted successfully');
    }

}


