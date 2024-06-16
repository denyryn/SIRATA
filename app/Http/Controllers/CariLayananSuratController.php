<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perihal;

class CariLayananSuratController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the search query parameter
        $searchQuery = $request->input('template_search');

        // Construct the base query with eager loading
        $templatesQuery = Perihal::with('Kategori_Surat');

        // Apply search filters if a search query is provided
        if (!empty($searchQuery)) {
            $templatesQuery->where('nama_perihal', 'like', '%' . $searchQuery . '%')
                ->orWhereHas('Kategori_Surat', function ($query) use ($searchQuery) {
                    $query->where('nama_kategori', 'like', '%' . $searchQuery . '%');
                });
        }

        // Paginate the results
        $perihals = $templatesQuery->paginate(10);

        // Construct the data for view based on existing views
        $data_perihal = [];

        foreach ($perihals as $perihal) {
            $nama_kategori = strtolower(str_replace(' ', '_', $perihal->Kategori_Surat->nama_kategori ?? ''));

            if (view()->exists('surat.template.' . $nama_kategori)) {
                // Include data for this $template since the view exists
                $data_perihal[] = [
                    'perihal' => $perihal,
                    'nama_kategori' => $nama_kategori,
                ];
            }
        }

        return view('surat.index', compact('data_perihal'));
    }
}
