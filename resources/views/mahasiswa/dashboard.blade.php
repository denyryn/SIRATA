@extends('layout.layout')

@section('title', 'Dashboard')
@section('header', 'Sirata / Dashboard')

@section('content')
    <div>
        {{-- Kolom cari surat --}}
        <div class="flex justify-end mb-4 ">
            <div>
                <form class="flex items-center max-w-sm mx-auto">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M31.707 30.282l-9.717-9.776c1.811-2.169 2.902-4.96 2.902-8.007 0-6.904-5.596-12.5-12.5-12.5s-12.5 5.596-12.5 12.5 5.596 12.5 12.5 12.5c3.136 0 6.002-1.158 8.197-3.067l9.703 9.764c0.39 0.39 1.024 0.39 1.415 0s0.39-1.023 0-1.415zM12.393 23.016c-5.808 0-10.517-4.709-10.517-10.517s4.708-10.517 10.517-10.517c5.808 0 10.516 4.708 10.516 10.517s-4.709 10.517-10.517 10.517z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari Surat..." required />
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="overflow-auto">
            <table border="1" class="table">
                <thead>
                    <th>No.</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>Jenis Surat</th>
                    <th>Waktu</th>
                    <th>Lacak Surat</th>
                    <th>Keterangan</th>
                </thead>
                <tbody class="text-gray-900">
                    <td>1</td>
                    <td>17-09-1945</td>
                    <td>Proklamasi</td>
                    <td>Urgensi</td>
                    <td>03.00 AM</td>
                    <td>
                        <a href="{{ route('mahasiswa.lacak_surat') }}">
                            <button
                                class="p-2 px-4 text-center text-white duration-150 bg-orange-400 rounded-lg hover:bg-orange-500 active:ring-orange-400">
                                Lacak Surat
                            </button>
                        </a>
                    </td>
                    <td>
                        <div class="p-2 text-center text-white bg-green-400 rounded-lg">
                            Disetujui
                        </div>
                    </td>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center my-4 sm:justify-end">
            <div class="flex">
                <!-- Previous Button -->
                <a href="#"
                    class="flex items-center justify-center px-4 w-16 h-10 me-3 text-base font-medium text-gray-700 bg-blue-lightest  rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                </a>

                <a href="#"
                    class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-700 bg-blue-lightest rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
                    1
                </a>

                <a href="#"
                    class="flex items-center justify-center w-16 px-4 h-10 text-base font-medium text-gray-700 bg-blue-lightest rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
