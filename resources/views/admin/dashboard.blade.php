@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="grid grid-cols-2 gap-4 my-6 md:gap-12 md:grid-cols-3">
            <a href="" class="duration-150 hover:animate-pulse">
                <div class="text-white rounded-md bg-blue-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">60</span>
                            <span class="block text-sm font-light">Total Surat</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-blue-700 size-16 md:size-20" fill="currentColor" viewBox="0 0 24 24"
                                id="mail-notification-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg"
                                class="icon flat-line">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle id="secondary" cx="18.5" cy="6.5" r="2.5"
                                        style="fill: currentColor; stroke-width: 2;"></circle>
                                    <path id="primary" d="M21,13v6a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V7A1,1,0,0,1,4,6h8"
                                        style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </path>
                                    <path id="primary-2" data-name="primary"
                                        d="M14.15,11.31l-1.53,1.2a1,1,0,0,1-1.24,0l-8-6.3A1,1,0,0,1,4,6h8"
                                        style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </path>
                                    <circle id="primary-3" data-name="primary" cx="18.5" cy="6.5" r="2.5"
                                        style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </circle>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-blue-plain">
                        <span>More Info</span>
                        <div class="absolute size-4 ms-48">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.9995 15.9995L20.9995 11.9995M20.9995 11.9995L16.9995 7.99951M20.9995 11.9995H8.99951M12.9995 20.9995H6.20029C5.08019 20.9995 4.52014 20.9995 4.09231 20.7815C3.71599 20.5898 3.41003 20.2838 3.21828 19.9075C3.00029 19.4797 3.00029 18.9196 3.00029 17.7995V6.19951C3.00029 5.07941 3.00029 4.51935 3.21828 4.09153C3.41003 3.71521 3.71599 3.40925 4.09231 3.2175C4.52014 2.99951 5.08019 2.99951 6.20029 2.99951L12.9995 2.99951"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.prodi') }}">
                <div class="text-white rounded-md bg-red-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_prodi }}
                            </span>
                            <span class="block text-sm font-light">Total Prodi</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-red-700 size-16 md:size-20" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 13L24 8L44 13L24 18L4 13Z" stroke="currentColor" stroke-width="4"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13 16V25.9706C13 25.9706 18 29 24 29C30 29 35 25.9706 35 25.9706V16"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path d="M7 14V36" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <rect x="4" y="34" width="6" height="6" fill="currentColor"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></rect>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-red-plain">
                        <span>More Info</span>
                        <div class="absolute size-4 ms-48">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.9995 15.9995L20.9995 11.9995M20.9995 11.9995L16.9995 7.99951M20.9995 11.9995H8.99951M12.9995 20.9995H6.20029C5.08019 20.9995 4.52014 20.9995 4.09231 20.7815C3.71599 20.5898 3.41003 20.2838 3.21828 19.9075C3.00029 19.4797 3.00029 18.9196 3.00029 17.7995V6.19951C3.00029 5.07941 3.00029 4.51935 3.21828 4.09153C3.41003 3.71521 3.71599 3.40925 4.09231 3.2175C4.52014 2.99951 5.08019 2.99951 6.20029 2.99951L12.9995 2.99951"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <div class="text-white rounded-md bg-yellow-light h-36">
                <div class="h-[75%] grid grid-cols-2">
                    <div class="flex flex-col p-4 justify-evenly">
                        <span class="block text-4xl font-semibold md:text-5xl">60</span>
                        <span class="block text-sm font-light">Total Surat</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <svg class="text-yellow-700 size-16 md:size-20" fill="currentColor" viewBox="0 0 24 24"
                            id="mail-notification-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg"
                            class="icon flat-line">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <circle id="secondary" cx="18.5" cy="6.5" r="2.5"
                                    style="fill: currentColor; stroke-width: 2;"></circle>
                                <path id="primary" d="M21,13v6a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V7A1,1,0,0,1,4,6h8"
                                    style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                                <path id="primary-2" data-name="primary"
                                    d="M14.15,11.31l-1.53,1.2a1,1,0,0,1-1.24,0l-8-6.3A1,1,0,0,1,4,6h8"
                                    style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                                <circle id="primary-3" data-name="primary" cx="18.5" cy="6.5" r="2.5"
                                    style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </circle>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-yellow-plain">
                    <span>More Info</span>
                    <div class="absolute size-4 ms-48">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.9995 15.9995L20.9995 11.9995M20.9995 11.9995L16.9995 7.99951M20.9995 11.9995H8.99951M12.9995 20.9995H6.20029C5.08019 20.9995 4.52014 20.9995 4.09231 20.7815C3.71599 20.5898 3.41003 20.2838 3.21828 19.9075C3.00029 19.4797 3.00029 18.9196 3.00029 17.7995V6.19951C3.00029 5.07941 3.00029 4.51935 3.21828 4.09153C3.41003 3.71521 3.71599 3.40925 4.09231 3.2175C4.52014 2.99951 5.08019 2.99951 6.20029 2.99951L12.9995 2.99951"
                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.jabatan') }}">
                <div class="text-white rounded-md bg-red-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_jabatan }}
                            </span>
                            <span class="block text-sm font-light">Total Jabatan</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-red-700 size-16 md:size-20" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 13L24 8L44 13L24 18L4 13Z" stroke="currentColor" stroke-width="4"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13 16V25.9706C13 25.9706 18 29 24 29C30 29 35 25.9706 35 25.9706V16"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path d="M7 14V36" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <rect x="4" y="34" width="6" height="6" fill="currentColor"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></rect>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-red-plain">
                        <span>More Info</span>
                        <div class="absolute size-4 ms-48">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.9995 15.9995L20.9995 11.9995M20.9995 11.9995L16.9995 7.99951M20.9995 11.9995H8.99951M12.9995 20.9995H6.20029C5.08019 20.9995 4.52014 20.9995 4.09231 20.7815C3.71599 20.5898 3.41003 20.2838 3.21828 19.9075C3.00029 19.4797 3.00029 18.9196 3.00029 17.7995V6.19951C3.00029 5.07941 3.00029 4.51935 3.21828 4.09153C3.41003 3.71521 3.71599 3.40925 4.09231 3.2175C4.52014 2.99951 5.08019 2.99951 6.20029 2.99951L12.9995 2.99951"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>



            <a href="{{ route('admin.jabatan') }}">
                <div class="text-white rounded-md bg-red-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">{{ $total_jabatan}}</span>
                            <span class="block text-sm font-light">Jabatan</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-red-700 size-16 md:size-20" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 13L24 8L44 13L24 18L4 13Z" stroke="currentColor" stroke-width="4"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13 16V25.9706C13 25.9706 18 29 24 29C30 29 35 25.9706 35 25.9706V16"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path d="M7 14V36" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <rect x="4" y="34" width="6" height="6" fill="currentColor"
                                        stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></rect>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-red-plain">
                        <span>More Info</span>
                        <div class="absolute size-4 ms-48">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.9995 15.9995L20.9995 11.9995M20.9995 11.9995L16.9995 7.99951M20.9995 11.9995H8.99951M12.9995 20.9995H6.20029C5.08019 20.9995 4.52014 20.9995 4.09231 20.7815C3.71599 20.5898 3.41003 20.2838 3.21828 19.9075C3.00029 19.4797 3.00029 18.9196 3.00029 17.7995V6.19951C3.00029 5.07941 3.00029 4.51935 3.21828 4.09153C3.41003 3.71521 3.71599 3.40925 4.09231 3.2175C4.52014 2.99951 5.08019 2.99951 6.20029 2.99951L12.9995 2.99951"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>





        </div>
    </div>
@endsection
