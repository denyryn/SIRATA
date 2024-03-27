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

            <a href="{{ route('admin.kategori') }}">
                <div class="text-white rounded-md bg-yellow-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_kategori }}
                            </span>
                            <span class="block text-sm font-light">Kategori Surat</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-yellow-700 size-16 md:size-20" fill="currentColor" viewBox="-5.5 0 32 32"
                                version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>alignright</title>
                                    <path
                                        d="M19.938 9.75h-10.406c-0.469 0-0.844-0.438-0.844-0.875v-1.313c0-0.438 0.375-0.844 0.844-0.844h10.406c0.469 0 0.875 0.406 0.875 0.844v1.313c0 0.469-0.406 0.875-0.875 0.875zM19.938 14.813h-17.344c-0.469 0-0.875-0.375-0.875-0.875v-1.281c0-0.5 0.406-0.844 0.875-0.844h17.344c0.469 0 0.875 0.344 0.875 0.844v1.281c0 0.5-0.406 0.875-0.875 0.875zM19.938 19.906h-12.125c-0.469 0-0.875-0.406-0.875-0.875v-1.313c0-0.469 0.406-0.875 0.875-0.875h12.125c0.469 0 0.875 0.406 0.875 0.875v1.313c0 0.469-0.406 0.875-0.875 0.875zM0.906 22.219h19.031c0.469 0 0.875 0.438 0.875 0.875v1.281c0 0.5-0.406 0.906-0.875 0.906h-19.031c-0.5 0-0.906-0.406-0.906-0.906v-1.281c0-0.469 0.406-0.875 0.906-0.875z">
                                    </path>
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
                <div class="text-white rounded-md bg-green-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_prodi }}
                            </span>
                            <span class="block text-sm font-light">Total Jabatan</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-green-700 size-16 md:size-20" fill="currentColor" version="1.1"
                                id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 436.694 436.694"
                                xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M62.149,236.976c-11.562,0-22.41-4.653-30.548-13.101c-6.887-7.15-14.925-20.287-14.103-42.27 c1.011-26.945,22.523-40.339,42.681-41.688c0.541-0.036,3.385-0.129,4.728,0.059c19.928,1.642,40.895,15.036,41.891,41.629 c0.823,21.982-7.214,35.12-14.102,42.27C84.559,232.323,73.71,236.976,62.149,236.976z M62.149,159.837 c-11.09,0.506-24.071,6.681-24.665,22.518c-0.443,11.839,2.503,21.399,8.521,27.645c4.333,4.499,10.066,6.976,16.144,6.976 c6.077,0,11.811-2.478,16.144-6.976c6.017-6.246,8.963-15.806,8.52-27.646C86.22,166.517,73.239,160.344,62.149,159.837z M116.119,351.457c5.43-1.006,9.017-6.224,8.012-11.654l-8.633-46.609c-5.041-27.216-30.427-39.397-53.35-39.397 c-22.922,0-48.308,12.182-53.349,39.397l-8.632,46.609c-0.541,2.921,0.245,5.932,2.145,8.216s4.717,3.605,7.688,3.605l59.214-0.001 c5.523,0,10-4.477,10-10s-4.478-10-10-10l-47.192,0.001l6.443-34.788c2.948-15.916,19.042-23.04,33.684-23.04 s30.736,7.124,33.684,23.04l8.632,46.609c0.892,4.815,5.095,8.181,9.822,8.181C114.89,351.625,115.504,351.57,116.119,351.457z M218.345,181.093c-11.562,0-22.41-4.653-30.548-13.101c-6.887-7.149-14.924-20.286-14.102-42.268 c0.965-25.858,20.815-39.237,40.233-41.467c1.359-0.156,7.292-0.458,11.088,0.309c18.671,2.976,37.05,16.301,37.978,41.159 c0.823,21.981-7.214,35.118-14.102,42.267C240.755,176.44,229.907,181.093,218.345,181.093z M218.345,103.954 c-11.091,0.507-24.072,6.681-24.663,22.517c-0.443,11.84,2.502,21.4,8.519,27.646c4.333,4.499,10.067,6.976,16.144,6.976 s11.811-2.478,16.144-6.976c6.017-6.246,8.962-15.806,8.519-27.645C242.417,110.635,229.436,104.461,218.345,103.954z M272.317,295.573c5.431-1.006,9.018-6.224,8.011-11.654l-8.634-46.609c-5.041-27.215-30.426-39.397-53.347-39.397 S170.04,210.095,165,237.31l-8.636,46.609c-0.542,2.921,0.244,5.932,2.144,8.216c1.9,2.284,4.717,3.605,7.688,3.605l59.216-0.001 c5.523,0,10-4.477,10-10s-4.478-10-10-10l-47.193,0.001l6.446-34.788c2.948-15.916,19.041-23.04,33.682-23.04 s30.734,7.124,33.682,23.04l8.634,46.609c0.892,4.815,5.095,8.181,9.821,8.181C271.089,295.743,271.702,295.687,272.317,295.573z M374.541,125.211c-11.561,0-22.41-4.653-30.548-13.101c-6.887-7.15-14.924-20.287-14.102-42.269 c0.982-26.233,21.399-39.622,41.082-41.556c1.076-0.106,7.382-0.005,9.12,0.233c19.046,2.614,38.147,15.969,39.098,41.322 c0.822,21.983-7.215,35.12-14.103,42.27C396.951,120.559,386.103,125.211,374.541,125.211z M374.543,48.072 c-11.091,0.507-24.073,6.681-24.665,22.517c-0.443,11.84,2.503,21.4,8.52,27.646c4.333,4.498,10.066,6.976,16.144,6.976 c6.078,0,11.811-2.478,16.145-6.976c6.017-6.246,8.963-15.806,8.52-27.646C398.612,54.753,385.632,48.579,374.543,48.072z M428.513,239.692c5.43-1.006,9.017-6.224,8.012-11.654l-8.633-46.61c-5.042-27.216-30.428-39.397-53.351-39.397 c-22.921,0-48.307,12.183-53.347,39.397l-8.634,46.609c-0.542,2.921,0.245,5.932,2.145,8.216s4.717,3.605,7.688,3.605l59.214-0.001 c5.523,0,10-4.477,10-10s-4.478-10-10-10l-47.192,0.001l6.445-34.788c2.948-15.916,19.041-23.04,33.682-23.04 c14.642,0,30.736,7.124,33.685,23.04l8.632,46.609c0.892,4.815,5.095,8.181,9.822,8.181 C427.284,239.861,427.898,239.806,428.513,239.692z M114.298,408.449c2.81,0,5.489-1.182,7.384-3.256l48.924-53.568l99.89-0.001 c2.78,0,5.435-1.158,7.327-3.195l48.934-52.687l99.935-0.001c5.523,0,10-4.477,10-10s-4.477-10-10-10l-104.299,0.001 c-2.968,0-5.634,1.293-7.465,3.347l-48.792,52.535l-99.939,0.001c-2.81,0-5.489,1.182-7.384,3.256l-48.925,53.568L10,388.45 c-5.523,0-10,4.477-10,10s4.477,10,10,10L114.298,408.449z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-green-plain">
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
