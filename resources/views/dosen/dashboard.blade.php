@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        {{-- Bar Pencarian Surat --}}
        <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
            <div class="justify-end">
                <form action="{{ route('dosen.index') }}" method="GET" class="flex items-center max-w-sm mx-auto">
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
                    <th class="text-center">ID.</th>
                    <th class="text-center">Tanggal Surat</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Keterangan</th>
                </thead>
                <tbody class="text-gray-900">
                    @foreach ($data_surat as $surat)
                        <tr>
                            <td class="text-center">{{ $surat->id_surat }}</td>
                            <td class="text-center">{{ $surat->tanggal_buat }}</td>
                            <td class="text-center">{{ $surat->nama_perihal }}</td>
                            <td class="text-center">{{ $surat->nama_kategori }}</td>
                            <td class="text-center">{{ $surat->jam_buat }}</td>
                            <td class="flex flex-row justify-center">
                                @if (str_contains(strtolower($surat->status_terbaru), 'disetujui'))
                                    <a href="{{ route('dosen.surat.stream', $surat->id_surat) }}"
                                        class="p-2 px-4 text-center text-white duration-150 bg-green-600 rounded-lg btn animate-none hover:bg-green-700"
                                        title="Unduh Surat Selesai">
                                        <span class="text-white size-5">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M3 15C3 17.8284 3 19.2426 3.87868 20.1213C4.75736 21 6.17157 21 9 21H15C17.8284 21 19.2426 21 20.1213 20.1213C21 19.2426 21 17.8284 21 15"
                                                        stroke="currentColor" stroke-width="2.16" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="currentColor"
                                                        stroke-width="2.16" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                @else
                                    <a href="{{ route('dosen.surat.preview', $surat->id_surat) }}"
                                        class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg btn animate-none hover:bg-blue-700"
                                        title="Periksa">
                                        <span class="text-white size-5">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 52.00 52.00" enable-background="new 0 0 52 52"
                                                xml:space="preserve" stroke="#000000" stroke-width="0.0005200000000000001">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <path
                                                            d="M51.8,25.1C47.1,15.6,37.3,9,26,9S4.9,15.6,0.2,25.1c-0.3,0.6-0.3,1.3,0,1.8C4.9,36.4,14.7,43,26,43 s21.1-6.6,25.8-16.1C52.1,26.3,52.1,25.7,51.8,25.1z M26,37c-6.1,0-11-4.9-11-11s4.9-11,11-11s11,4.9,11,11S32.1,37,26,37z">
                                                        </path>
                                                        <path
                                                            d="M26,19c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S29.9,19,26,19z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                @endif
                                <a href="{{ route('dosen.surat.lacak', $surat->id_surat) }}"
                                    class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg btn animate-none hover:bg-blue-700"
                                    title="Lacak Surat">
                                    <span class="text-white size-5">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 16.5017C14.4853 16.5017 16.5 14.487 16.5 12.0017C16.5 9.5164 14.4853 7.50168 12 7.50168C9.51472 7.50168 7.5 9.5164 7.5 12.0017C7.5 14.487 9.51472 16.5017 12 16.5017ZM12 14.5034C10.6184 14.5034 9.49832 13.3833 9.49832 12.0017C9.49832 10.62 10.6184 9.5 12 9.5C13.3816 9.5 14.5017 10.62 14.5017 12.0017C14.5017 13.3833 13.3816 14.5034 12 14.5034Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11 1C11 0.447715 11.4477 0 12 0C12.5523 0 13 0.447715 13 1V2.04938C17.7244 2.51844 21.4816 6.27558 21.9506 11H23C23.5523 11 24 11.4477 24 12C24 12.5523 23.5523 13 23 13H21.9506C21.4816 17.7244 17.7244 21.4816 13 21.9506V23C13 23.5523 12.5523 24 12 24C11.4477 24 11 23.5523 11 23V21.9506C6.27558 21.4816 2.51844 17.7244 2.04938 13H1C0.447715 13 0 12.5523 0 12C-1.19209e-07 11.4477 0.447715 11 1 11H2.04938C2.51844 6.27558 6.27558 2.51844 11 2.04938V1ZM12 20.0016C7.58083 20.0016 3.99839 16.4192 3.99839 12C3.99839 7.58083 7.58083 3.99839 12 3.99839C16.4192 3.99839 20.0016 7.58083 20.0016 12C20.0016 16.4192 16.4192 20.0016 12 20.0016Z"
                                                    fill="currentColor"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
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

