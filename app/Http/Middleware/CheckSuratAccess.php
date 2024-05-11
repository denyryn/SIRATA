<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Surat;

class CheckSuratAccess
{
    public function handle(Request $request, Closure $next)
    {
        $id_surat = $request->route('id_surat');
        $surat = Surat::findOrFail($id_surat);

        // Lakukan pengecekan apakah pengguna memiliki akses ke surat yang diminta
        if ($surat->created_by !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
