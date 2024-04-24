@extends('layout.layout')

@section('title', 'Layanan')
@section('header', 'Sirata / Layanan Surat')

@section('content')
    {{-- Bar Pencarian Surat --}}
    <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
        {{-- <div class="searchbox">
            <form action="">
                <input type="search" placeholder="Cari Template"
                    class="py-1 text-sm border-none rounded-md outline-none focus:border-blue-500">
            </form>
        </div> --}}
        <div class="justify-end">
            <form class="flex items-center max-w-sm mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" viewBox="0 0 24 24"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#919191">
                            <g id="SVGRepo_bgCarrier" stroke-width="2"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <style type="text/css">
                                    .st0 {
                                        opacity: 0.2;
                                        fill: none;
                                        stroke: #000000;
                                        stroke-width: 5.000000e-02;
                                        stroke-miterlimit: 10;
                                    }
                                </style>
                                <g id="Layer_1"></g>
                                <g id="Layer_2">
                                    <g>
                                        <path
                                            d="M12,20H8c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h3v3c0,2.2,1.8,4,4,4h3v1.9c0,0.6,0.4,1,1,1s1-0.4,1-1V10c0,0,0,0,0-0.1 c0-0.1,0-0.2-0.1-0.3c0,0,0-0.1,0-0.1c0-0.1-0.1-0.2-0.2-0.3c0,0,0,0,0,0l-7-7c-0.1-0.1-0.2-0.1-0.3-0.2c0,0-0.1,0-0.1,0 c-0.1,0-0.2,0-0.3-0.1c0,0,0,0-0.1,0H8C5.8,2,4,3.8,4,6v12c0,2.2,1.8,4,4,4h4c0.6,0,1-0.4,1-1S12.6,20,12,20z M13,5.4L16.6,9H15 c-1.1,0-2-0.9-2-2V5.4z">
                                        </path>
                                        <path
                                            d="M20.7,20.3l-1-1c0,0-0.1-0.1-0.2-0.1c0.3-0.5,0.5-1.1,0.5-1.7c0-1.9-1.6-3.5-3.5-3.5S13,15.6,13,17.5s1.6,3.5,3.5,3.5 c0.6,0,1.2-0.2,1.7-0.5c0,0.1,0.1,0.1,0.1,0.2l1,1c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3C21.1,21.3,21.1,20.7,20.7,20.3z M16.5,19c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5S17.3,19,16.5,19z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Template..." required />
                </div>
            </form>
        </div>
    </nav>

    {{-- Form Surat --}}
    <div class="container mx-auto mt-10">
        <form method="POST" action="" class="max-w-md p-6 mx-auto bg-white rounded-md shadow-md">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="nama_pengaju" class="block mb-2 font-semibold text-gray-700">Nama Pengaju :</label>
                <input id="nama_pengaju" type="text" name="nama_pengaju" placeholder="Nama Pengaju"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="perihal" class="block mb-2 font-semibold text-gray-700">Perihal :</label>
                <input type="text" name="perihal" id="perihal" placeholder="Perihal"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
    </main>
@endsection

