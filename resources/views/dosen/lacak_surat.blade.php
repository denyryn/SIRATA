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
                    17-Agustus-1945
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
                    Proklamasi
                </td>
            </tr>
            <td>
                Jenis Surat
            </td>
            <td>
                :
            </td>
            <td>
                Urgensi
            </td>
        </table>

        <div class="">
            <div class="container">
                <div class="flex flex-col justify-start grid-cols-12 md:grid text-gray-50">

                    <div class="flex md:contents">
                        <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                            <div class="flex items-center justify-center w-6 h-full">
                                <div class="w-1 h-full bg-green-500 pointer-events-none"></div>
                            </div>
                            <div class="absolute w-6 h-6 -mt-3 text-center bg-green-500 rounded-full shadow top-1/2">
                                <i class="text-white fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-green-500 shadow-md rounded-xl">
                            <h3 class="mb-1 text-lg font-semibold">Surat Telah Dikirim</h3>
                            <p class="w-full leading-tight text-justify">
                                21 Juli 2021, 04:30 PM
                            </p>
                        </div>
                    </div>

                    <div class="flex md:contents">
                        <div class="relative col-end-2 mr-10 col-start-0 md:mx-auto">
                            <div class="flex items-center justify-center w-6 h-full">
                                <div class="w-1 h-full bg-green-500 pointer-events-none"></div>
                            </div>
                            <div class="absolute w-6 h-6 -mt-3 text-center bg-green-500 rounded-full shadow top-1/2">
                                <i class="text-white fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="w-full col-start-2 col-end-13 p-4 my-4 mr-auto bg-green-500 shadow-md rounded-xl">
                            <h3 class="mb-1 text-lg font-semibold">Surat Diketahui Oleh Dosen Wali</h3>
                            <p class="leading-tight text-justify">
                                22 Juli 2021, 01:00 PM
                            </p>
                        </div>
                    </div>

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
                            <h3 class="mb-1 text-lg font-semibold text-gray-50">Surat Ditolak</h3>
                            <p class="leading-tight text-justify">
                                Oleh Kepala Program Studi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
