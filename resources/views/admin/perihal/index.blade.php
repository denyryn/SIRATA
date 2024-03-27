@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Button untuk trigger modals, modals harus diinclude (di bawah) -->
            <button data-modal-target="add-perihal-modal" data-modal-toggle="add-perihal-modal"
                class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700" type="button">
                Tambah Perihal
            </button>
        </div>

        {{-- Menampilkan Data Program Studi --}}
        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>perihal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_perihal->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($data_perihal as $perihal)
                        <tr>
                            <td>{{ $perihal->id_perihal }}</td>
                            <td>{{ $perihal->nama_perihal }}</td>
                            <form class="w-full" method="POST" action="{{ route('perihal.delete', $perihal->id_perihal) }}">
                                @csrf
                                @method('DELETE')

                                <td class="grid grid-cols-2">
                                    {{-- <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('perihal.edit', $perihal->id_perihal) }}">
                                        Edit
                                    </a> --}}

                                    <a data-modal-target="edit-perihal-modal{{ $perihal->id_perihal }}"
                                        data-modal-toggle="edit-perihal-modal{{ $perihal->id_perihal }}"
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
    @include('admin.perihal.modals.create')

    {{-- Iterasi supaya modals edit dari semua data dapat keluar --}}
    @foreach ($data_perihal as $perihal)
        @include('admin.perihal.modals.edit')
    @endforeach

@endsection
