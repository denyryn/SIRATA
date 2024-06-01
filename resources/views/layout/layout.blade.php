<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <title>Trying Layouting</title> --}}
    <title>@yield('title')</title>
</head>

<body class="font-poppins">
    @if (Session::has('akses'))
        @php
            $akses = Session::get('akses');
        @endphp

        @switch($akses)
            @case('admin')
                @include('layout.sidebars.admin_sidebar')
            @break

            @case('mahasiswa')
                @include('layout.sidebars.mahasiswa_sidebar')
            @break

            @case('dosen')
                @include('layout.sidebars.dosen_sidebar')
            @break

            @default
                {{-- Default action jika 'akses' tidak cocok dengan admin, mahasiswa, atau dosen --}}
        @endswitch
    @endif

    {{-- header --}}
    <div class="p-4 content sm:ml-64">
        <div class="flex flex-row items-center my-4 justify-evenly md:justify-end">
            <img class="h-10" src="{{ asset('images/polines-wquote.png') }}" alt="Politeknik Negeri Semarang">
            <div class="flex flex-row items-center ms-2">
                <img class="size-8" src="{{ asset('images/sirata-gradient-logo.png') }}" alt="Logo Sirata">
                <img class="h-10 ms-1" src="{{ asset('images/sirata-gradient-letters.png') }}" alt="Text Sirata">
            </div>
        </div>
        <div class="flex justify-end">
            @if (session('success'))
                <div id="toast-success"
                    class="absolute flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 "
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="text-sm font-normal ms-3">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @elseif (session('error'))
                <div id="toast-danger"
                    class="absolute flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="text-sm font-normal ms-3">{{ session('error') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#toast-danger" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
        <div class="text-blue-light">
            {{-- Head / Posisi --}}
            <div class="flex items-center w-full p-4 mb-4 font-normal bg-blue-100 h-14 rounded-xl">
                <svg class="h-5" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"
                    fill="currentColor">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <style type="text/css">
                            .st0 {
                                fill: none;
                                stroke: currentColor;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-miterlimit: 10;
                            }

                            .st1 {
                                fill: none;
                                stroke: currentColor;
                                stroke-width: 2;
                                stroke-linejoin: round;
                                stroke-miterlimit: 10;
                            }
                        </style>
                        <polyline class="st0" points="2,16 12,22 22,16 "></polyline>
                        <path class="st0"
                            d="M18,11H6c-2.2,0-4,1.8-4,4v10c0,2.2,1.8,4,4,4h12c2.2,0,4-1.8,4-4V15C22,12.8,20.2,11,18,11z">
                        </path>
                        <line class="st0" x1="21.5" y1="13.1" x2="30" y2="8"></line>
                        <path class="st0" d="M22,21h4c2.2,0,4-1.8,4-4V7c0-2.2-1.8-4-4-4H14c-2.2,0-4,1.8-4,4v4">
                        </path>
                    </g>
                </svg>

                {{-- Membuat format path untuk header --}}
                @php
                    $path = str_replace('_', ' ', request()->path()); // Replace underscores with spaces
                    $formattedPath = ucwords(str_replace('/', ' / ', $path)); // Capitalize each word and add spaces around slashes
                @endphp
                <h1 class="ms-2">
                    Sirata / {{ $formattedPath }}
                </h1>
            </div>

            @yield('content')

        </div>
    </div>

</body>

</html>

