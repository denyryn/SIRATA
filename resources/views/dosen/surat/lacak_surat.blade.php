@extends('layout.layout')

@section('title', 'Lacak Surat')

@section('content')
    <div>
        <div class="flex items-center w-full h-10 mb-4 text-white bg-blue-light ps-4 rounded-xl">
            <span>Status Surat</span>
        </div>
        <table class="mx-4 text-gray-900 border-separate border-spacing-y-4" style="border-spacing: 0 10px;">
            <tr>
                <td>
                    Tanggal Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    : &NonBreakingSpace;
                </td>
                <td>
                    {{ $data_surat['tanggal_surat'] }}
                </td>
            </tr>
            <tr>
                <td>
                    Perihal
                </td>
                <td>
                    :
                </td>
                <td>
                    {{ $data_surat['surat']->nama_perihal }}
                </td>
            </tr>
            <td>
                Kategori Surat
            </td>
            <td>
                :
            </td>
            <td>
                {{ $data_surat['surat']->kategori_surat->nama_kategori }}
            </td>
        </table>

        <div class="">
            <div class="container">
                <div class="flex justify-start grid-cols-12 md:grid text-gray-50">
                    @foreach ($data_surat['riwayats'] as $riwayat)
                        @if (str_contains(strtolower($riwayat->nama_status), 'pending'))
                            <div class="flex md:contents">
                                <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                                    <div class="flex items-center justify-center w-6 h-full">
                                        <div class="w-1 h-full bg-yellow-500 pointer-events-none"></div>
                                    </div>
                                    <div
                                        class="absolute w-6 h-6 -mt-3 text-center bg-yellow-500 rounded-full shadow top-1/2">
                                        <i class="text-white fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div
                                    class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-yellow-500 shadow-md rounded-xl">
                                    <h3 class="mb-1 text-lg font-semibold">
                                        {{ $riwayat->nama_status }}
                                    </h3>
                                    <p class="w-full leading-tight text-justify">

                                    </p>
                                    <span class="w-full leading-tight text-justify">
                                        {{ $riwayat->waktu_status }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (str_contains(strtolower($riwayat->nama_status), 'diproses'))
                            <div class="flex md:contents">
                                <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                                    <div class="flex items-center justify-center w-6 h-full">
                                        <div class="w-1 h-full bg-orange-500 pointer-events-none"></div>
                                    </div>
                                    <div
                                        class="absolute w-6 h-6 -mt-3 text-center bg-orange-500 rounded-full shadow top-1/2">
                                        <i class="text-white fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div
                                    class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-orange-500 shadow-md rounded-xl">
                                    <h3 class="mb-1 text-lg font-semibold">
                                        {{ $riwayat->nama_status }}
                                    </h3>
                                    <span class="leading-tight text-justify">
                                        {{ $riwayat->waktu_status }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (str_contains(strtolower($riwayat->nama_status), 'disetujui'))
                            <div class="flex md:contents">
                                <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                                    <div class="flex items-center justify-center w-6 h-full">
                                        <div class="w-1 h-full bg-green-500 pointer-events-none"></div>
                                    </div>
                                    <div
                                        class="absolute w-6 h-6 -mt-3 text-center bg-green-500 rounded-full shadow top-1/2">
                                        <i class="text-white fas fa-times-circle"></i>
                                    </div>
                                </div>
                                <div
                                    class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-green-500 shadow-md rounded-xl">
                                    <h3 class="mb-1 text-lg font-semibold text-gray-50">
                                        {{ $riwayat->nama_status }}
                                    </h3>
                                    <span class="leading-tight text-justify">
                                        {{ $riwayat->waktu_status }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (str_contains(strtolower($riwayat->nama_status), 'ditolak'))
                            <div class="flex md:contents">
                                <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                                    <div class="flex items-center justify-center w-6 h-full">
                                        <div class="w-1 h-full bg-red-500 pointer-events-none"></div>
                                    </div>
                                    <div class="absolute w-6 h-6 -mt-3 text-center bg-red-500 rounded-full shadow top-1/2">
                                        <i class="text-white fas fa-times-circle"></i>
                                    </div>
                                </div>
                                <div class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-red-500 shadow-md rounded-xl">
                                    <h3 class="mb-1 text-lg font-semibold text-gray-50">
                                        {{ $riwayat->nama_status }}
                                    </h3>
                                    @if (isset($riwayat->keterangan_status))
                                        <p class="font-extralight text-md">
                                            {{ $riwayat->keterangan_status }}
                                        </p>
                                    @endif
                                    <span class="leading-tight text-justify">
                                        {{ $riwayat->waktu_status }}
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

