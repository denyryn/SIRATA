<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Pemohon;

class CheckSuratAccess
{
    public function handle(Request $request, Closure $next)
    {
        $id_surat = $request->route('id_surat');
        
        // Dapatkan surat yang diminta
        $surat = Surat::findOrFail($id_surat);
        
        // Dapatkan pemohon terkait dengan surat
        $pemohon = $surat->Pemohon->first();
        
        // Periksa apakah pengguna yang terautentikasi memiliki akses ke surat
        if ($pemohon && $pemohon->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
