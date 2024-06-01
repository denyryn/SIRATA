@extends('layout.layout')

@section('title', 'Layanan')
@section('header', 'Sirata / Layanan Surat')

@section('content')
    {{-- Bar Pencarian Surat --}}
    <nav class="flex items-center justify-end w-full p-2 font-normal bg-blue-500 h-fit rounded-xl">
        <div class="justify-end">
            <form action="{{ route(Session::get('akses') . '.surat.search') }}" method="GET"
                class="flex items-center max-w-sm mx-auto">
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
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <input type="text" id="template_search" name="template_search"
                        class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                        placeholder="Cari Template..." required />
                </div>
                <button type="submit" hidden></button>
            </form>
        </div>
    </nav>

    @if (!$data_perihal)
        <div class="flex flex-col items-center justify-center h-screen">
            <img src="{{ asset('images/404.png') }}" class="size-[20rem]" alt="">
            <span class="font-bold">Data Surat Tidak Ditemukan</span>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="grid grid-cols-3 gap-4 mt-5 lg:grid-cols-5 grid-flow-dense">
        @foreach ($data_perihal as $perihal)
            <a href="{{ route(Session::get('akses') . '.surat.form', $perihal['perihal']->id_perihal) }}" class="">
                <div class="flex-col w-full h-64 p-3 duration-100 rounded-md bg-blue-light hover:bg-blue-400">
                    <div class="">
                        <div class="w-2/3 h-3 my-1 bg-gray-200 rounded-sm"></div>
                        <div class="w-1/2 h-3 my-1 bg-gray-200 rounded-sm"></div>
                    </div>

                    <div class="my-10">
                        <div class="w-full h-3 my-1 bg-gray-200 rounded-sm"></div>
                        <div class="w-full h-3 my-1 bg-gray-200 rounded-sm"></div>
                        <div class="w-full h-3 my-1 bg-gray-200 rounded-sm"></div>
                        <div class="w-full h-3 my-1 bg-gray-200 rounded-sm"></div>
                        <div class="w-2/3 h-3 my-1 bg-gray-200 rounded-sm"></div>
                    </div>

                    <div>
                        <div class="w-2/3 h-3 my-1 bg-gray-200 rounded-sm place-self-end"></div>
                        <div class="w-1/2 h-3 my-1 bg-gray-200 rounded-sm"></div>
                    </div>
                </div>
                <p class="my-1 text-sm text-center text-gray-900">
                    {{ $perihal['perihal']->nama_perihal }}
                </p>
            </a>
        @endforeach
    </main>
@endsection

