@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        {{-- Kolom cari surat --}}
        <nav class="flex items-center justify-between w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
            <div>
                <form method="GET" class="flex flex-row" action="{{ route('admin.surat') }}">
                    <div class="relative w-full me-2">
                        <span class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3 text-blue-light">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.0686 15H7.9313C7.32548 15 7.02257 15 6.88231 15.1198C6.76061 15.2238 6.69602 15.3797 6.70858 15.5393C6.72305 15.7232 6.93724 15.9374 7.36561 16.3657L11.4342 20.4344C11.6323 20.6324 11.7313 20.7314 11.8454 20.7685C11.9458 20.8011 12.054 20.8011 12.1544 20.7685C12.2686 20.7314 12.3676 20.6324 12.5656 20.4344L16.6342 16.3657C17.0626 15.9374 17.2768 15.7232 17.2913 15.5393C17.3038 15.3797 17.2392 15.2238 17.1175 15.1198C16.9773 15 16.6744 15 16.0686 15Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M7.9313 9.00005H16.0686C16.6744 9.00005 16.9773 9.00005 17.1175 8.88025C17.2393 8.7763 17.3038 8.62038 17.2913 8.46082C17.2768 8.27693 17.0626 8.06274 16.6342 7.63436L12.5656 3.56573C12.3676 3.36772 12.2686 3.26872 12.1544 3.23163C12.054 3.199 11.9458 3.199 11.8454 3.23163C11.7313 3.26872 11.6323 3.36772 11.4342 3.56573L7.36561 7.63436C6.93724 8.06273 6.72305 8.27693 6.70858 8.46082C6.69602 8.62038 6.76061 8.7763 6.88231 8.88025C7.02257 9.00005 7.32548 9.00005 7.9313 9.00005Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </span>
                        <select
                            class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            name="sort_by" id="sort_by" onchange="this.form.submit()">
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date
                                Created
                            </option>
                            <option value="nama_perihal" {{ request('sort_by') == 'nama_perihal' ? 'selected' : '' }}>Name
                            </option>
                            <!-- Add other columns as needed -->
                        </select>
                    </div>
                    <div class="me-2">
                        <label class="hidden" for="sort_direction">Sort direction:</label>
                        <select
                            class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            name="sort_direction" id="sort_direction" onchange="this.form.submit()">
                            <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending
                            </option>
                            <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending
                            </option>
                        </select>
                    </div>
                </form>
            </div>
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
                            class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
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
                    <th class="text-center">NIM / NIP</th>
                    <th class="text-center">Nama pengaju</th>
                    <th class="text-center">Perihal</th>
                    <th class="text-center">Jenis Surat</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Keterangan</th>
                </thead>
                <tbody class="text-gray-900">
                    @foreach ($data_surat as $surat)
                        @php
                            $nama_pengaju = $surat->user->dosen
                                ? $surat->user->dosen->nama_dosen
                                : $surat->user->mahasiswa->nama_mahasiswa;

                            $surat->nama_pengaju = $nama_pengaju;

                            $color = '';
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
                        <tr>
                            <td>{{ $surat->id_surat }}</td>
                            <td>{{ $surat->tanggal_buat }}</td>
                            <td>{{ $surat->user->username }}</td>
                            <td>{{ strtoupper($surat->nama_pengaju) }}</td>
                            <td>{{ $surat->nama_perihal }}</td>
                            <td>{{ $surat->nama_kategori }}</td>
                            <td>{{ $surat->jam_buat }}</td>
                            <td class="flex flex-row items-center justify-center">
                                @if (!str_contains(strtolower($surat->status_terbaru), 'disetujui'))
                                    <a href="{{ route('admin.surat.preview', $surat->id_surat) }}" class="w-fit">
                                        <button
                                            class="p-2 px-4 text-center text-white duration-150 bg-blue-600 rounded-lg animate-none btn hover:bg-blue-700"
                                            title="Periksa">
                                            <span class="text-white size-5">
                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 52.00 52.00" enable-background="new 0 0 52 52"
                                                    xml:space="preserve" stroke="#000000"
                                                    stroke-width="0.0005200000000000001">
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
                                        </button>
                                    </a>
                                @endif
                                @if (str_contains(strtolower($surat->status_terbaru), 'disetujui'))
                                    <a href="{{ route('admin.surat.stream', $surat->id_surat) }}"
                                        class="p-2 px-4 text-center text-white duration-150 bg-green-600 rounded-lg btn hover:bg-green-700"
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
                                                        stroke-width="2.16" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                @elseif (str_contains(strtolower($surat->status_terbaru), 'ybs'))
                                    <a href="{{ route('admin.surat.download', $surat->id_surat) }}"
                                        class="p-2 px-4 ml-2 text-center text-white duration-150 bg-orange-600 rounded-lg btn hover:bg-orange-700"
                                        title="unduh Surat Proses">
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
                                                        stroke-width="2.16" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                @endif

                            </td>
                            <td>
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

