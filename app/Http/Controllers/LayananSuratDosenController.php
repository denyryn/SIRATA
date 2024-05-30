<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Perihal;
use App\Models\Surat;
use App\Models\Status;
use App\Models\User;
use App\Models\Pemohon;
use App\Models\Riwayat;
use App\Models\Dosen;
use App\Models\Jabatan;

use Carbon\Carbon;

Carbon::setLocale('id');

class LayananSuratDosenController extends Controller
{
    public function index()
    {
        // Ambil data perihal dengan menyertakan relasi Kategori_Surat
        $data_perihals = Perihal::with('Kategori_Surat')->paginate(10);

        // Inisialisasi array untuk menyimpan data perihal yang akan ditampilkan
        $data_perihal = [];

        // Loop melalui setiap perihal
        foreach ($data_perihals as $perihal) {
            // Ambil nama kategori dalam huruf kecil dan ganti spasi dengan garis bawah
            $nama_kategori = strtolower(str_replace(' ', '_', $perihal->kategori_Surat->nama_kategori ?? ''));

            // Periksa apakah kategori surat adalah "dosen"
            if ($perihal->kategori_Surat->peruntukkan === "dosen" && view()->exists('surat.template.' . $nama_kategori)) {
                // Sertakan data perihal jika kategori adalah "dosen" dan view tersedia
                $data_perihal[] = [
                    'perihal' => $perihal,
                    'nama_kategori' => $nama_kategori,
                ];
            }
        }

        // Kirimkan data perihal yang telah difilter ke view
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

        // Retrieve the user ID from the session
        $id_user = Session::get('id_user');

        $user_sekarang = User::find($id_user);

        $dosen_sekarang = Dosen::where('id_user', $id_user)->first();

        $dosens = Dosen::all();
        $jabatans = Jabatan::with('Dosen')->get();
        $peruntukkan = $data_perihal->kategori_Surat->peruntukkan;

        $rendered_template = view($template, compact('no', 'data_perihal', 'tanggal_sekarang', 'dosen_sekarang'))->render();
        return view($form, compact('data_perihal', 'jabatans', 'peruntukkan', 'form', 'rendered_template', 'dosens', 'dosen_sekarang', 'user_sekarang'));
    }

    public function store(Request $request)
    {
        $status_awal = 'Pending';
        $count = $request->input('count');

        $request->validate([
            'lampiran' => 'nullable|mimes:pdf',
        ]);

        // Dapatkan ID pengguna yang saat ini masuk
        $id_user_pembuat = Session::get('id_user');

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

        $data_surat->id_user_pembuat = $id_user_pembuat;
        $data_surat->save();

        // Handle multiple id_user values
        for ($i = 1; $i <= $count; $i++) {
            if ($request->has("id_user$i")) {
                $id_user = $request->input("id_user$i");

                $data_pemohon = new Pemohon;
                $data_pemohon->id_user = $id_user;
                $data_pemohon->id_surat = $data_surat->id_surat;
                $data_pemohon->save();
            }
        }

        $data_riwayat = new Riwayat;
        $data_riwayat->nama_status = $status_awal;
        $data_riwayat->id_surat = $data_surat->id_surat;
        $data_riwayat->save();

        return redirect()->route("dosen.index");
    }
}
