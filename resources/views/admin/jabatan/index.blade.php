@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Button untuk trigger modals, modals harus diinclude (di bawah) -->
            <button data-modal-target="add-jabatan-modal" data-modal-toggle="add-jabatan-modal"
                class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700" type="button">
                Tambah Jabatan
            </button>
        </div>

        {{-- Menampilkan Data Program Studi --}}
        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jabatan</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_jabatan->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($data_jabatan as $jabatan)
                        <tr>
                            <td>{{ $jabatan->id_jabatan }}</td>
                            <td>{{ $jabatan->nama_jabatan }}</td>
                            <td>{{ isset($jabatan->dosen->nama_dosen) ? $jabatan->dosen->nama_dosen : '-' }}</td>
                            <form class="w-full" method="POST" action="{{ route('jabatan.delete', $jabatan->id_jabatan) }}">
                                @csrf
                                @method('DELETE')

                                <td class="grid grid-cols-2">
                                    {{-- <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('jabatan.edit', $jabatan->id_jabatan) }}">
                                        Edit
                                    </a> --}}

                                    <a data-modal-target="edit-jabatan-modal{{ $jabatan->id_jabatan }}"
                                        data-modal-toggle="edit-jabatan-modal{{ $jabatan->id_jabatan }}"
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
    @include('admin.jabatan.modals.create')

    {{-- Iterasi supaya modals edit dari semua data dapat keluar --}}
    @foreach ($data_jabatan as $jabatan)
        @include('admin.jabatan.modals.edit')
    @endforeach

@endsection

