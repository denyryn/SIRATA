<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class LayananProxyApiController extends Controller
{
    public function getMahasiswa(Request $request)
    {
        $response = Http::withHeaders(['api-key' => env('API_KEY')])
            ->get(env('MAHASISWA_API_URL'), $request->all());

        return $response->json();
    }

    public function postMahasiswa(Request $request)
    {
        $response = Http::withHeaders(['api-key' => env('API_KEY')])
            ->post(env('MAHASISWA_API_URL'), $request->all());

        return $response->json();
    }

    public function getDosen(Request $request)
    {
        $response = Http::withHeaders(['api-key' => env('API_KEY')])
            ->post(env('DOSEN_API_URL'), $request->all());

        return $response->json();
    }

    public function postDosen(Request $request)
    {
        $response = Http::withHeaders(['api-key' => env('API_KEY')])
            ->post(env('DOSEN_API_URL'), $request->all());

        return $response->json();
    }
}
