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
                    <th>NIM / NIP</th>
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
                            <td>{{ $surat->pemohon }}</td>
                            <td>{{ $surat->nama_perihal }}</td>
                            <td>{{ $surat->nama_kategori }}</td>
                            <td>{{ $surat->jam_buat }}</td>
                            <td class="flex flex-row">
                                @if (!str_contains(strtolower($surat->status_terbaru), 'disetujui'))
                                    <a href="{{ route('admin.surat.preview', $surat->id_surat) }}" class="w-fit">
                                        <button
                                            class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg btn hover:bg-blue-700">
                                            Preview
                                        </button>
                                    </a>
                                @endif
                                @if (str_contains(strtolower($surat->status_terbaru), 'disetujui'))
                                    <a href="{{ route('admin.surat.stream', $surat->id_surat) }}"
                                        class="p-2 px-4 ml-2 text-center text-white duration-150 bg-green-600 rounded-lg btn hover:bg-green-700">
                                        <svg class="text-white size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5.625 15C5.625 14.5858 5.28921 14.25 4.875 14.25C4.46079 14.25 4.125 14.5858 4.125 15H5.625ZM4.875 16H4.125H4.875ZM19.275 15C19.275 14.5858 18.9392 14.25 18.525 14.25C18.1108 14.25 17.775 14.5858 17.775 15H19.275ZM11.1086 15.5387C10.8539 15.8653 10.9121 16.3366 11.2387 16.5914C11.5653 16.8461 12.0366 16.7879 12.2914 16.4613L11.1086 15.5387ZM16.1914 11.4613C16.4461 11.1347 16.3879 10.6634 16.0613 10.4086C15.7347 10.1539 15.2634 10.2121 15.0086 10.5387L16.1914 11.4613ZM11.1086 16.4613C11.3634 16.7879 11.8347 16.8461 12.1613 16.5914C12.4879 16.3366 12.5461 15.8653 12.2914 15.5387L11.1086 16.4613ZM8.39138 10.5387C8.13662 10.2121 7.66533 10.1539 7.33873 10.4086C7.01212 10.6634 6.95387 11.1347 7.20862 11.4613L8.39138 10.5387ZM10.95 16C10.95 16.4142 11.2858 16.75 11.7 16.75C12.1142 16.75 12.45 16.4142 12.45 16H10.95ZM12.45 5C12.45 4.58579 12.1142 4.25 11.7 4.25C11.2858 4.25 10.95 4.58579 10.95 5H12.45ZM4.125 15V16H5.625V15H4.125ZM4.125 16C4.125 18.0531 5.75257 19.75 7.8 19.75V18.25C6.61657 18.25 5.625 17.2607 5.625 16H4.125ZM7.8 19.75H15.6V18.25H7.8V19.75ZM15.6 19.75C17.6474 19.75 19.275 18.0531 19.275 16H17.775C17.775 17.2607 16.7834 18.25 15.6 18.25V19.75ZM19.275 16V15H17.775V16H19.275ZM12.2914 16.4613L16.1914 11.4613L15.0086 10.5387L11.1086 15.5387L12.2914 16.4613ZM12.2914 15.5387L8.39138 10.5387L7.20862 11.4613L11.1086 16.4613L12.2914 15.5387ZM12.45 16V5H10.95V16H12.45Z"
                                                    fill="currentColor"></path>
                                            </g>
                                        </svg>
                                    </a>
                                @elseif (str_contains(strtolower($surat->status_terbaru), 'ybs'))
                                    <a href="{{ route('admin.surat.download', $surat->id_surat) }}"
                                        class="p-2 px-4 ml-2 text-center text-white duration-150 bg-orange-600 rounded-lg btn hover:bg-orange-700">
                                        <svg class="text-white size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5.625 15C5.625 14.5858 5.28921 14.25 4.875 14.25C4.46079 14.25 4.125 14.5858 4.125 15H5.625ZM4.875 16H4.125H4.875ZM19.275 15C19.275 14.5858 18.9392 14.25 18.525 14.25C18.1108 14.25 17.775 14.5858 17.775 15H19.275ZM11.1086 15.5387C10.8539 15.8653 10.9121 16.3366 11.2387 16.5914C11.5653 16.8461 12.0366 16.7879 12.2914 16.4613L11.1086 15.5387ZM16.1914 11.4613C16.4461 11.1347 16.3879 10.6634 16.0613 10.4086C15.7347 10.1539 15.2634 10.2121 15.0086 10.5387L16.1914 11.4613ZM11.1086 16.4613C11.3634 16.7879 11.8347 16.8461 12.1613 16.5914C12.4879 16.3366 12.5461 15.8653 12.2914 15.5387L11.1086 16.4613ZM8.39138 10.5387C8.13662 10.2121 7.66533 10.1539 7.33873 10.4086C7.01212 10.6634 6.95387 11.1347 7.20862 11.4613L8.39138 10.5387ZM10.95 16C10.95 16.4142 11.2858 16.75 11.7 16.75C12.1142 16.75 12.45 16.4142 12.45 16H10.95ZM12.45 5C12.45 4.58579 12.1142 4.25 11.7 4.25C11.2858 4.25 10.95 4.58579 10.95 5H12.45ZM4.125 15V16H5.625V15H4.125ZM4.125 16C4.125 18.0531 5.75257 19.75 7.8 19.75V18.25C6.61657 18.25 5.625 17.2607 5.625 16H4.125ZM7.8 19.75H15.6V18.25H7.8V19.75ZM15.6 19.75C17.6474 19.75 19.275 18.0531 19.275 16H17.775C17.775 17.2607 16.7834 18.25 15.6 18.25V19.75ZM19.275 16V15H17.775V16H19.275ZM12.2914 16.4613L16.1914 11.4613L15.0086 10.5387L11.1086 15.5387L12.2914 16.4613ZM12.2914 15.5387L8.39138 10.5387L7.20862 11.4613L11.1086 16.4613L12.2914 15.5387ZM12.45 16V5H10.95V16H12.45Z"
                                                    fill="currentColor"></path>
                                            </g>
                                        </svg>
                                    </a>
                                @endif

                            </td>
                            <td>
                                @php
                                    if (str_contains(strtolower($surat->status_terbaru), 'pending')) {
                                        $color = 'yellow';
                                    } elseif (str_contains(strtolower($surat->status_terbaru), 'diproses')) {
                                        $color = 'orange';
                                    } elseif (str_contains(strtolower($surat->status_terbaru), 'disetujui')) {
                                        $color = 'green';
                                    } elseif (str_contains(strtolower($surat->status_terbaru), 'ditolak')) {
                                        $color = 'red';
                                    }
                                @endphp
                                <div
                                    class="p-2 w-full text-center text-white bg-{{ $color }}-600 rounded-lg pointer-events-none btn animate-none">
                                    {{ $surat->status_terbaru }}
                                    <div class="hidden bg-yellow-600"></div>
                                    <div class="hidden bg-orange-600"></div>
                                    <div class="hidden bg-red-600"></div>
                                    <div class="hidden bg-green-600"></div>
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

