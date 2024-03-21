@extends('layout.layout')

@section('title', 'Dashboard')
@section('header', 'Sirata / Dashboard')

@section('content')
    {{-- <h1>Edit Prodi</h1>
    <form method="POST" action="{{ route('prodi.update', $data_prodi->id_prodi) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_prodi">Nama Prodi : </label>
            <input id="nama_prodi" type="text" name="nama_prodi" placeholder="Nama Prodi"
                value="{{ $data_prodi->nama_prodi }}">
            <br>

            <input class="btn" type="submit" value="update">
        </div>
    </form> --}}


    <div>
        <div class="flex justify-end">
            <!-- Modal toggle -->
            <button data-modal-target="add-prodi-modal" data-modal-toggle="add-prodi-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Prodi
            </button>
        </div>

        <!-- Main modal -->
        <div id="add-prodi-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambah Prodi
                        </h3>
                        <button type="button"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="add-prodi-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="POST" action="{{ route('prodi.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Prodi</label>
                                <input type="text" name="nama_prodi" id="nama_prodi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Ketik nama program studi" required="">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah Prodi
                        </button>
                    </form>
                </div>
            </div>
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
                                    <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('prodi.edit', $prodi->id_prodi) }}">
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
    </div>
@endsection
