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
                            <form class="w-full" method="POST" action="{{ route('prodi.delete', $prodi->id_prodi) }}">
                                @csrf
                                @method('DELETE')
                                <td class="grid grid-cols-2">
                                    {{-- <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('prodi.edit', $prodi->id_prodi) }}">
                                        Edit
                                    </a> --}}

                                    <a data-modal-target="edit-prodi-modal{{ $prodi->id_prodi }}"
                                        data-modal-toggle="edit-prodi-modal{{ $prodi->id_prodi }}"
                                        class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700"
                                        href="#">
                                        Edit
                                    </a>

                                    <button type="submit"
                                        class="m-2 text-white bg-red-600 btn no-animation hover:bg-red-700"
                                        onclick="return confirm('Confirm delete?')">Delete</button>
                                </td>
                            </form>
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
