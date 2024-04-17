@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="grid grid-cols-2 gap-4 my-6 md:gap-12 md:grid-cols-3">

            <a href="#" class="duration-150 cursor-not-allowed">
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
                        <div class="absolute hidden size-4 ms-48 md:flex">
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
                        <div class="absolute hidden size-4 ms-48 md:flex">
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
                <div class="text-white rounded-md bg-pink-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_kategori }}
                            </span>
                            <span class="block text-sm font-light">Kategori Surat</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-pink-700 size-16 md:size-20" fill="currentColor" viewBox="-5.5 0 32 32"
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
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-pink-plain">
                        <span>More Info</span>
                        <div class="absolute hidden size-4 ms-48 md:flex">
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
                        <div class="absolute hidden size-4 ms-48 md:flex">
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

            <a href="{{ route('admin.status') }}">
                <div class="text-white rounded-md bg-yellow-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_status }}
                            </span>
                            <span class="block text-sm font-light">Status Surat</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-yellow-700 size-16 md:size-20" viewBox="0 0 24 24" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M10.0247 4.75C9.61049 4.75 9.2747 5.08579 9.2747 5.5C9.2747 5.91421 9.61049 6.25 10.0247 6.25V4.75ZM13.3397 6.25C13.7539 6.25 14.0897 5.91421 14.0897 5.5C14.0897 5.08579 13.7539 4.75 13.3397 4.75V6.25ZM10.4822 17.5C10.4822 17.0858 10.1464 16.75 9.7322 16.75C9.31799 16.75 8.9822 17.0858 8.9822 17.5H10.4822ZM14.3822 17.5C14.3822 17.0858 14.0464 16.75 13.6322 16.75C13.218 16.75 12.8822 17.0858 12.8822 17.5H14.3822ZM11.6822 7.326L11.7043 6.57633C11.6898 6.5759 11.6754 6.57589 11.6609 6.5763L11.6822 7.326ZM16.5514 11.758L17.2986 11.6935C17.2973 11.679 17.2957 11.6646 17.2936 11.6502L16.5514 11.758ZM17.1364 14.758L16.4197 14.9791C16.4441 15.0581 16.4813 15.1326 16.53 15.1994L17.1364 14.758ZM17.3635 16.67L18.0154 17.041C18.0311 17.0132 18.0451 16.9845 18.0573 16.955L17.3635 16.67ZM15.979 17.497L15.979 18.2471L15.9885 18.2469L15.979 17.497ZM7.38343 17.497L7.37395 18.247H7.38343V17.497ZM5.99893 16.67L5.30543 16.9556C5.3175 16.9849 5.33142 17.0134 5.3471 17.041L5.99893 16.67ZM6.2222 14.761L6.82983 15.2006C6.87787 15.1343 6.9147 15.0604 6.93886 14.9821L6.2222 14.761ZM6.8072 11.761L6.06492 11.6536C6.06287 11.6679 6.06122 11.6822 6.05998 11.6965L6.8072 11.761ZM10.0247 6.25H13.3397V4.75H10.0247V6.25ZM8.9822 17.5C8.9822 19.0008 10.1732 20.25 11.6822 20.25V18.75C11.0372 18.75 10.4822 18.2084 10.4822 17.5H8.9822ZM11.6822 20.25C13.1912 20.25 14.3822 19.0008 14.3822 17.5H12.8822C12.8822 18.2084 12.3272 18.75 11.6822 18.75V20.25ZM11.6601 8.07567C13.7382 8.13689 15.4977 9.72056 15.8091 11.8658L17.2936 11.6502C16.8814 8.81119 14.5374 6.65979 11.7043 6.57633L11.6601 8.07567ZM15.8041 11.8225C15.8967 12.8944 16.103 13.9529 16.4197 14.9791L17.853 14.5369C17.5679 13.6128 17.3819 12.6593 17.2986 11.6935L15.8041 11.8225ZM16.53 15.1994C16.7768 15.5384 16.8317 15.9908 16.6698 16.385L18.0573 16.955C18.4159 16.0821 18.298 15.0794 17.7427 14.3166L16.53 15.1994ZM16.7117 16.299C16.5524 16.579 16.2682 16.7433 15.9696 16.7471L15.9885 18.2469C16.832 18.2363 17.5989 17.7727 18.0154 17.041L16.7117 16.299ZM15.979 16.747H7.38343V18.247H15.979V16.747ZM7.3929 16.7471C7.09428 16.7433 6.8101 16.579 6.65075 16.299L5.3471 17.041C5.76357 17.7727 6.53044 18.2363 7.37395 18.2469L7.3929 16.7471ZM6.69242 16.3844C6.53048 15.9912 6.58448 15.5397 6.82983 15.2006L5.61458 14.3214C5.06265 15.0842 4.94681 16.0848 5.30543 16.9556L6.69242 16.3844ZM6.93886 14.9821C7.25551 13.9559 7.4619 12.8974 7.55442 11.8255L6.05998 11.6965C5.97661 12.6623 5.79067 13.6158 5.50554 14.5399L6.93886 14.9821ZM7.54948 11.8684C7.86016 9.72025 9.62274 8.1347 11.7035 8.0757L11.6609 6.5763C8.82409 6.65675 6.47609 8.81078 6.06492 11.6536L7.54948 11.8684Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-yellow-plain">
                        <span>More Info</span>
                        <div class="absolute hidden size-4 ms-48 md:flex">
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

            <a href="{{ route('admin.perihal') }}">
                <div class="text-white rounded-md bg-orange-light h-36">
                    <div class="h-[75%] grid grid-cols-2">
                        <div class="flex flex-col p-4 justify-evenly">
                            <span class="block text-4xl font-semibold md:text-5xl">
                                {{ $total_perihal }}
                            </span>
                            <span class="block text-sm font-light">Total Perihal</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <svg class="text-orange-700 size-16 md:size-20" fill="currentColor" viewBox="0 0 24 24"
                                id="heading-0" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg"
                                class="icon flat-color">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path id="primary"
                                        d="M20,22H15a1,1,0,0,1,0-2h1V13H8v7H9a1,1,0,0,1,0,2H4a1,1,0,0,1,0-2H5V4H4A1,1,0,0,1,4,2H9A1,1,0,0,1,9,4H8v7h8V4H15a1,1,0,0,1,0-2h5a1,1,0,0,1,0,2H19V20h1a1,1,0,0,1,0,2Z"
                                        style="fill: currentColor;"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-center rounded-md h-[25%] bg-orange-plain">
                        <span>More Info</span>
                        <div class="absolute hidden size-4 ms-48 md:flex">
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
