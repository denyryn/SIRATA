{{-- Ada perubahan kecil pada penamaan file layout untuk halaman login --}}
@extends('layout.layout_minimal')

@section('title', 'Login')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen px-4 py-10 bg-blue-light">

        @if (session('error'))
            <div id="toast-default"
                class="flex items-center w-full max-w-xs p-4 mb-5 text-gray-900 bg-white rounded-lg shadow" role="alert">
                <div class="text-sm font-normal ms-3">{{ session('error') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-default" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="bg-white w-max h-max rounded-xl">
            <div class="flex flex-col items-center m-14">

                <div class="flex flex-row items-center mb-5">
                    <img class="size-12 w-fit" src="{{ asset('images/polines-wquote.png') }}"
                        alt="Politeknik Negeri Semarang">
                    <div class="flex flex-row items-center ms-4">
                        <img class="size-10" src="{{ asset('images/sirata-gradient-logo.png') }}" alt="Sirata Blue Logo">
                        <img class="h-14 ps-1" src="{{ asset('images/sirata-gradient-letters.png') }}"
                            alt="Sirata Blue Logo">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="m-4 flex flex-col items-start md:min-w-[50vh]">
                        <span class="self-center font-bold tracking-tight md:self-start">Masukkan Username dan
                            Password</span>
                        <form action="{{ route('postlogin') }}" class="w-full">
                            <div class="form-control">
                                <label for="username" class="label">
                                    <span class="label-text">Username</span>
                                </label>
                                <input id="username" name="username" type="text" placeholder="NIM/NIP"
                                    class="w-full input input-bordered rounded-2xl" required />
                            </div>
                            <div class="form-control">
                                <label for="password" class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input id="password" name="password" type="password" placeholder="Password"
                                    class="input input-bordered rounded-2xl " required />
                            </div>
                            <div class="mt-3 form-control">
                                <button
                                    class="text-white border-none animate-none bg-blue-plain btn hover:bg-blue-light">Login</button>
                            </div>

                        </form>
                    </div>
                    <div class="m-4 flex-col items-start md:max-w-[50vh] text-justify hidden md:flex">
                        <span class="mb-2 font-bold tracking-tighter">SIRATA (Sistem Informasi Surat Terpadu)<br>Politeknik
                            Negeri Semarang</span>
                        <div class="text-sm tracking-tight">
                            <p class="my-2">
                                Sistem pelayanan surat terpadu mahasiswa merupakan sebuah web untuk memudahkkan mahasiswa
                                dalam melakukan berbagai jenis pengajuan surat mahasiswa serta pengelolaan manajemen data
                                surat untuk setiap mahasiswa.
                            </p>
                            <p class="my-2">
                                Silahkan masukkan username dan password sesuai dengan NIM/NIP anda untuk mengakses, sesuai
                                dengan hak akses yang anda miliki.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

