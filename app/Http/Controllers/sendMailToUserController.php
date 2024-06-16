<?php

namespace App\Http\Controllers;

use App\Mail\SendToUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\Surat;
use App\Models\User;

use Carbon\Carbon;

class SendMailToUserController extends Controller
{
    public function index(Request $request, $id_surat)
    {

        $surat = Surat::find($id_surat);

        if ($surat->user->email) {
            $tanggal_surat = Carbon::parse($surat->created_at)->locale('id_ID')->translatedFormat('l, j F Y');
            $pengaju = $surat->user->dosen ?? $surat->user->mahasiswa;
            $status_terakhir = $surat->Riwayat()->latest()->first()->nama_status;

            $email_user = $surat->user->email;
            $data_status_terakhir = $status_terakhir;
            $data_pengaju = $pengaju;

            $data_surat = [
                'surat' => $surat,
                'tanggal_surat' => $tanggal_surat
            ];

            $data_email = [
                'data_surat' => $data_surat,
                'data_status_terakhir' => $data_status_terakhir,
                'data_pengaju' => $data_pengaju,
            ];

            Mail::to($email_user)->send(new SendToUserMail($data_email));
        }

        return redirect(route('admin.surat'));
    }
}
