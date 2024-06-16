<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;
use App\Models\Riwayat;

class UploadSuratController extends Controller
{
    public function index(Request $request, $id_surat)
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

        return redirect(route('admin.users.send_mail', compact('id_surat')));
    }

}
