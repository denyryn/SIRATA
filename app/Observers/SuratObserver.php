<?php

namespace App\Observers;

use App\Models\Surat;
use App\Models\User;

use App\Mail\NotifyAdminMail;
use Illuminate\Support\Facades\Mail;

class SuratObserver
{
    /**
     * Handle the Surat "created" event.
     */
    public function created(Surat $surat): void
    {
        $email_admin = User::where('akses', 'admin')->first()->email ?? 'admin@sirata.com';
        $nama_pembuat = $surat->user->dosen->nama_dosen ?? $surat->user->mahasiswa->nama_mahasiswa;
        $perihal = $surat->nama_perihal;
        $kategori = $surat->Kategori_Surat->nama_kategori;

        $data_email = [
            'email_admin' => $email_admin,
            'nama_pembuat' => $nama_pembuat,
            'perihal' => $perihal,
            'kategori' => $kategori
        ];

        Mail::to('adminel@sirata.com')->send(new NotifyAdminMail($data_email));
    }

    /**
     * Handle the Surat "updated" event.
     */
    public function updated(Surat $surat): void
    {
        //
    }

    /**
     * Handle the Surat "deleted" event.
     */
    public function deleted(Surat $surat): void
    {
        //
    }

    /**
     * Handle the Surat "restored" event.
     */
    public function restored(Surat $surat): void
    {
        //
    }

    /**
     * Handle the Surat "force deleted" event.
     */
    public function forceDeleted(Surat $surat): void
    {
        //
    }
}
