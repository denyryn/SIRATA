@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        {{-- Bar Pencarian Surat --}}
        <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
            <div class="justify-end">
                <form action="{{ route('mahasiswa.index') }}" method="GET" class="flex items-center max-w-sm mx-auto">
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
                    <th>No.</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>Jenis Surat</th>
                    <th>Waktu</th>
                    <th>Lacak Surat</th>
                    <th>Keterangan</th>
                </thead>
                <tbody class="text-gray-900">
                    @foreach ($data_surat as $surat)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $surat->tanggal_buat }}</td>
                            <td>{{ $surat->nama_perihal }}</td>
                            <td>{{ $surat->nama_kategori }}</td>
                            <td>{{ $surat->jam_buat }}</td>
                            <td class="flex flex-row">
                                <a href="route('admin.surat.preview', $surat->id_surat)">
                                    <button
                                        class="p-2
                                px-4 text-center btn text-white duration-150 bg-blue-400 rounded-lg hover:bg-blue-500
                                active:ring-orange-400">
                                        Preview
                                    </button>
                                </a>
                                <a href="">
                                    <button
                                        class="p-2
                                px-4 text-center btn text-white duration-150 bg-yellow-200 rounded-lg hover:bg-yellow-300
                                active:ring-orange-400">
                                        Lacak Surat
                                    </button>
                                </a>
                            </td>
                            <td>
                                <div
                                    class="p-2 btn animate-none pointer-events-none hover:bg-green-400 text-center text-white bg-green-400 rounded-lg">
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

