<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Surat;

class CekAksesSurat
{
    public function handle(Request $request, Closure $next)
    {
        $id_surat = $request->route('id_surat');
        $surat = Surat::find($id_surat);

        // Lakukan pengecekan apakah pengguna memiliki akses ke surat yang diminta
        if ($surat->id_user_pembuat !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
