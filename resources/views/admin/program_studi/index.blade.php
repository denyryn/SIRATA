@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Button untuk trigger modals, modals harus diinclude (di bawah) -->
            <button data-modal-target="add-prodi-modal" data-modal-toggle="add-prodi-modal"
                class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700" type="button">
                Tambah Prodi
            </button>
        </div>

        {{-- Menampilkan Data Program Studi --}}
        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_prodi->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($data_prodi as $prodi)
                        <tr>
                            <td>{{ $prodi->id_prodi }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td>
                                <a data-modal-target="edit-prodi-modal{{ $prodi->id_prodi }}"
                                    data-modal-toggle="edit-prodi-modal{{ $prodi->id_prodi }}"
                                    class="w-full m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700"
                                    href="#">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Include modals supaya form popup keluar --}}
    @include('admin.program_studi.modals.create')

    {{-- Iterasi supaya modals edit dari semua data dapat keluar --}}
    @foreach ($data_prodi as $prodi)
        @include('admin.program_studi.modals.edit')
    @endforeach

@endsection

