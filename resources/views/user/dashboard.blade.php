@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
<main class="text-blue-light">
    {{-- Head / Posisi --}}
    <div class="w-full bg-blue-100 h-14 rounded-xl p-4 items-center font-normal ">
        <h1>Sirata / Dashboard</h1>
    </div>

    {{-- Kolom cari surat --}}
    <div class="my-4 flex justify-end ">
        <label class="searchbox">
            <form action="">
                <input type="search" placeholder="Cari Surat" class="rounded-xl active:ring-blue-light text-sm">
            </form>
        </label>
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
            <tbody>
                <td>1</td>
                <td>17-09-1945</td>
                <td>Proklamasi</td>
                <td>Urgensi</td>
                <td>03.00 AM</td>
                <td>
                    <button href="#" class="bg-orange-400 text-white text-center p-2 px-4 rounded-lg ">
                        Lacak Surat
                    </button>
                </td>
                <td>
                    <div class="bg-green-400 text-white text-center p-2 rounded-lg">
                        Disetujui
                    </div>
                </td>
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="my-4">
        <div class="flex">
            <!-- Previous Button -->
            <a href="#" class="flex items-center justify-center px-4 w-16 h-10 me-3 text-base font-medium text-gray-700 bg-blue-lightest  rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
            <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            </a>

            <a href="#" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-700 bg-blue-lightest rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
                1
            </a>

            <a href="#" class="flex items-center justify-center w-16 px-4 h-10 text-base font-medium text-gray-700 bg-blue-lightest rounded-[0.85rem] hover:bg-gray-100 hover:text-gray-700">
            <svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
            </a>
        </div>
    </div>
</main>
@endsection
