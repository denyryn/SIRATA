@extends('indexLayout.layout')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 py-10 bg-blue-light">
        <div class="bg-white w-max h-max rounded-xl">
            <div class="flex flex-col items-center m-14">

                <div class="flex flex-row items-center mb-5">
                    <img class="size-12"
                        src="https://web.polines.ac.id/wp-content/uploads/2022/01/Logo-Polines-96dpi-200px.png"
                        alt="Politeknik Negeri Semarang">
                    <img class="ms-4 size-12" src="{{ asset('images/hme.png') }}" alt="Himpunan Mahasiswa Elektro">
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
                            <table class="min-w-full border-separate border-spacing-y-4">
                                <tr>

                                </tr>
                                <tr>
                                    <div class="form-control">
                                        <label for="password" class="label">
                                            <span class="label-text">Password</span>
                                        </label>
                                        <input id="password" name="password" type="password" placeholder="Password"
                                            class="input input-bordered rounded-2xl " required />
                                    </div>
                                </tr>
                            </table>
                            <label class="label">
                                <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                            </label>
                            <div class="mt-1 form-control">
                                <button class="text-white border-none bg-blue-plain btn hover:bg-blue-light">Login</button>
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
