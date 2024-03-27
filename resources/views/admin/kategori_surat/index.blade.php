@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Modal toggle -->
            <button data-modal-target="add-kategori-modal" data-modal-toggle="add-kategori-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Kategori
            </button>
        </div>

        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_kategori->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($data_kategori as $kategori)
                        <tr>
                            <td>{{ $kategori->id_kategori_surat }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <form class="w-full" method="POST"
                                action="{{ route('kategori.delete', $kategori->id_kategori_surat) }}">
                                @csrf
                                @method('DELETE')
                                <td class="grid grid-cols-2">
                                    <a data-modal-target="edit-kategori-modal{{ $kategori->id_kategori_surat }}"
                                        data-modal-toggle="edit-kategori-modal{{ $kategori->id_kategori_surat }}"
                                        class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700"
                                        href="#">
                                        Edit
                                    </a>

                                    <button type="submit"
                                        class="m-2 text-white bg-red-600 btn no-animation hover:bg-red-400"
                                        onclick="return confirm('Confirm delete?')">Delete</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- Include modals supaya form popup keluar --}}
        @include('admin.kategori_surat.modals.create')

        {{-- Iterasi supaya modals edit dari semua data dapat keluar --}}
        @foreach ($data_kategori as $kategori)
            @include('admin.kategori_surat.modals.edit')
        @endforeach

    </div>
@endsection
