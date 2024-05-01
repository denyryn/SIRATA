@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        {{-- Kolom cari surat --}}
        <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
            <div class="">
                <form action="{{ route('admin.surat') }}" method="GET" class="flex items-center max-w-sm mx-auto">
                    @csrf
                    @method('GET')

                    <label for="template_search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="surat_search" name="surat_search"
                            class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                            placeholder="Cari Template..." required />
                    </div>
                    <button type="submit" hidden></button>
                </form>
            </div>
        </nav>

        {{-- Pagination --}}
        <div class="my-5">
            {{ $data_surat->links() }}
        </div>

        {{-- Tabel --}}
        <div class="overflow-auto">
            <table border="1" class="table">
                <thead>
                    <th>ID.</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>Jenis Surat</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                    <th>Keterangan</th>
                </thead>
                <tbody class="text-gray-900">
                    @foreach ($data_surat as $surat)
                        <tr>
                            <td>{{ $surat->id_surat }}</td>
                            <td>{{ $surat->tanggal_buat }}</td>
                            <td>{{ $surat->nama_perihal }}</td>
                            <td>{{ $surat->nama_kategori }}</td>
                            <td>{{ $surat->jam_buat }}</td>
                            <td class="flex flex-row">
                                <a href="{{ route('admin.surat.preview', $surat->id_surat) }}" class="w-full">
                                    <button
                                        class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg btn hover:bg-blue-700">
                                        Preview
                                    </button>
                                </a>
                                <a href="{{ route('admin.surat.download', $surat->id_surat) }}" class="w-full">
                                    <button
                                        class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg btn hover:bg-blue-700">
                                        Download
                                    </button>
                                </a>
                            </td>
                            <td>
                                @php
                                    switch ($surat->status_terbaru) {
                                        case 'Pending':
                                            $color = 'yellow';
                                            break;
                                        case 'Diproses':
                                            $color = 'orange';
                                            break;
                                        case 'Disetujui':
                                            $color = 'green';
                                            break;
                                        case 'Ditolak':
                                            $color = 'red';
                                            break;
                                    }
                                @endphp
                                <div
                                    class="p-2 w-full text-center text-white bg-{{ $color }}-600 rounded-lg pointer-events-none btn animate-none">
                                    {{ $surat->status_terbaru }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="my-5">
            {{ $data_surat->links() }}
        </div>

    </div>
@endsection

