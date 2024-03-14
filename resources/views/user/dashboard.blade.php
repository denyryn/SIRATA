@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
<main class="text-blue-light">
    {{-- Head / Posisi --}}
    <div class="w-full bg-blue-100 h-14 rounded-xl p-4 items-center font-normal ">
        <h1>Sirata / Dashboard</h1>
    </div>
    {{-- Kolom cari surat --}}
    <div class="my-4 flex justify-end">
        <label class="searchbox">
            <form action="">
                <input type="search" placeholder="Cari Surat" class="rounded-xl">
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
                    <a href="#" class="bg-orange-400 text-white text-center p-2 px-4 rounded-lg ">Lacak Surat</a>
                </td>
                <td>
                    <div class="bg-green-400 text-white text-center p-2 rounded-lg">
                        Disetujui
                    </div>
                </td>
            </tbody>
        </table>
    </div>
</main>
@endsection
