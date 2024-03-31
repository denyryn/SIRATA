@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Button untuk trigger modals, modals harus diinclude (di bawah) -->
            <button data-modal-target="add-kategori-modal" data-modal-toggle="add-kategori-modal"
                class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700" type="button">
                Tambah Kategori
            </button>
        </div>

        {{-- Menampilkan Data Kategori --}}
        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($data_kategori as $kategori)
                        <tr>
                            <td>{{ $kategori->id_kategori }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <form class="w-full" method="POST" action="{{ route('kategori.delete', $kategori->id_kategori) }}">
                                @csrf
                                @method('DELETE')

                                <td class="grid grid-cols-2">
                                    {{-- <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('kategori.update', $kategori->id_kategori) }}">
                                        Edit
                                    </a> --}}

                                    <a data-modal-target="edit-kategori-modal{{ $kategori->id_kategori }}"
                                        data-modal-toggle="edit-kategori-modal{{ $kategori->id_kategori }}"
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
                
            </tbody>
        </table>
    </div>

    {{-- Include modals supaya form popup keluar --}}
    @include('admin.kategori.modals.create')

    {{-- Iterasi supaya modals edit dari semua data dapat keluar --}}
    @foreach ($data_kategori as $kategori)
        @include('admin.kategori.modals.edit')
    @endforeach

@endsection