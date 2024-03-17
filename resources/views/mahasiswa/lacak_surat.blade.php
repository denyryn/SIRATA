@extends('layout.layout')

@section('title', 'Dashboard')
@section('header', 'Sirata / Dashboard / Lacak')

@section('content')
    <div>
        <div class="w-full h-10 bg-blue-light flex items-center ps-4 rounded-xl text-white mb-4">
            <span>Status Surat</span>
        </div>
        <table class="text-gray-900 mx-4 border-separate border-spacing-y-4" style="border-spacing: 0 10px;">
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
                <div class="flex flex-col justify-start md:grid grid-cols-12 text-gray-50">

                    <div class="flex md:contents">
                        <div class="col-start-0 col-end-2 mr-10 md:mx-auto relative">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-green-500  pointer-events-none"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-green-500 shadow text-center">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                        </div>
                        <div class="bg-green-500 col-start-2 col-end-13 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                            <h3 class="font-semibold text-lg mb-1">Surat Telah Dikirim</h3>
                            <p class="leading-tight text-justify w-full">
                                21 Juli 2021, 04:30 PM
                            </p>
                        </div>
                    </div>

                    <div class="flex md:contents">
                        <div class="col-start-0 col-end-2 mr-10 md:mx-auto relative">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-green-500 pointer-events-none"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-green-500 shadow text-center">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                        </div>
                        <div class="bg-green-500 col-start-2 col-end-13 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                            <h3 class="font-semibold text-lg mb-1">Surat Diketahui Oleh Dosen Wali</h3>
                            <p class="leading-tight text-justify">
                                22 Juli 2021, 01:00 PM
                            </p>
                        </div>
                    </div>

                    <div class="flex md:contents">
                        <div class="col-start-0 col-end-2 mr-10 md:mx-auto relative">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-red-500 pointer-events-none"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-red-500 shadow text-center">
                                <i class="fas fa-times-circle text-white"></i>
                            </div>
                        </div>
                        <div class="bg-red-500 col-start-2 col-end-13 p-4 rounded-xl my-4 mr-auto shadow-md w-full">
                            <h3 class="font-semibold text-lg mb-1 text-gray-50">Surat Ditolak</h3>
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
