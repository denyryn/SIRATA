@extends('layout.layout_minimal')

@section('title', 'Email from Sirata Admin')

@section('content')
    <div class="h-full p-8 bg-blue-lighter">
        <div class="flex flex-col items-center justify-center p-4 bg-white rounded-md">
            <div class="flex flex-row items-center justify-center mb-8">
                <img class="h-12" src="{{ asset('images/sirata-gradient-logo.png') }}" alt="">
                <img class="h-16 ps-2" src="{{ asset('images/sirata-gradient-letters.png') }}" alt="">
            </div>

            @php
                $name = $data_pengaju->nama_dosen ?? $data_pengaju->nama_mahasiswa;
                $nameParts = explode(' ', $name);
                $firstName = ucfirst(strtolower($nameParts[0]));
                $name = $firstName;

                if ($data_pengaju->nama_dosen) {
                    $akses = 'dosen';
                } elseif ($data_pengaju->nama_mahasiswa) {
                    $akses = 'mahasiswa';
                }
            @endphp

            <span class="mb-8 text-xl font-semibold text-center text-blue-plain">Halo,
                {{ $name }}</span>

            <div class="flex flex-col items-center justify-center text-gray-700 text-pretty">
                @if (str_contains(strtolower($data_status_terakhir), 'disetujui'))
                    <p class="mb-4 text-sm text-center ">Surat {{ $data_surat['surat']->nama_perihal }} yang kamu ajukan
                        pada {{ $data_surat['tanggal_surat'] }}
                        kemarin, sudah YBS setujui nih.
                        Cek suratnya
                        yuk!</p>
                    <a href="{{ route($akses . '.surat.stream', $data_surat['surat']->id_surat) }}"
                        class="w-1/2 mb-8 text-white rounded-md btn animate-none bg-blue-light hover:bg-blue-plain">
                        Cek Surat
                    </a>
                    <p class="text-sm italic text-center break-all text-blue-light">
                        {{ route($akses . '.surat.stream', $data_surat['surat']->id_surat) }}
                    </p>
                @elseif(str_contains(strtolower($data_status_terakhir), 'ditolak'))
                    <p class="mb-4 text-sm text-center ">Yahh, Surat {{ $data_surat['surat']->nama_perihal }} yang kamu
                        ajukan pada {{ $data_surat['tanggal_surat'] }}
                        kemarin, baru saja YBS tolak nih.
                        Cek kesalahan suratnya
                        yuk!</p>
                    <a href="{{ route($akses . '.surat.lacak', $data_surat['surat']->id_surat) }}"
                        class="w-1/2 mb-8 text-white rounded-md btn animate-none bg-blue-light hover:bg-blue-plain">
                        Cek Surat
                    </a>
                    <p class="text-sm italic text-center break-all text-blue-light">
                        {{ route($akses . '.surat.lacak', $data_surat['surat']->id_surat) }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection

