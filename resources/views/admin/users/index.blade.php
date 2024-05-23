@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        {{-- Kolom cari surat
        <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
            <div class="">
                <form action="" method="GET" class="flex items-center max-w-sm mx-auto">
                    @csrf
                    @method('GET')

                    <label for="user_search" class="sr-only">Search</label>
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
                        <input type="text" id="user_search" name="user_search"
                            class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                            placeholder="Cari User..." required />
                    </div>
                    <button type="submit" hidden></button>
                </form>
            </div>
        </nav> --}}

        <div>
            <div class="flex flex-row justify-between py-5 rounded-lg w-fit outline ">

                <div class="mx-5">
                    <a class="bg-transparent outline outline-blue-600 h-[20rem] size-fit btn hover:text-white text-blue-600 hover:bg-blue-600 animate-none"
                        href="{{ route('admin.manage_users.dosen') }}">
                        <div class="hover:text-white size-40">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M4 21C4 17.4735 6.60771 14.5561 10 14.0709M19.8726 15.2038C19.8044 15.2079 19.7357 15.21 19.6667 15.21C18.6422 15.21 17.7077 14.7524 17 14C16.2923 14.7524 15.3578 15.2099 14.3333 15.2099C14.2643 15.2099 14.1956 15.2078 14.1274 15.2037C14.0442 15.5853 14 15.9855 14 16.3979C14 18.6121 15.2748 20.4725 17 21C18.7252 20.4725 20 18.6121 20 16.3979C20 15.9855 19.9558 15.5853 19.8726 15.2038ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z"
                                        stroke="currentColor" stroke-width="0.8399999999999999" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <span class="text-lg font-semibold">Dosen</span>
                        </div>
                    </a>
                </div>

                <div class="mx-5">
                    <a class="bg-transparent outline outline-blue-600 h-[20rem] size-fit btn hover:text-white text-blue-600 hover:bg-blue-600 animate-none"
                        href="{{ route('admin.manage_users.dosen') }}">
                        <div class="hover:text-white size-40">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                        stroke="currentColor" stroke-width="0.9600000000000002" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <span class="text-lg font-semibold">Mahasiswa</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection

