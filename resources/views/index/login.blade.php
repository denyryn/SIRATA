@extends('indexLayout.layout')

@section('title', 'Login')

@section('content')
    <div class="bg-blue-light min-h-screen py-10 px-4 flex justify-center items-center">
        <div class="bg-white w-max h-max rounded-xl">
            <div class="m-14 flex items-center flex-col">

                <div class="mb-5">
                    <img class="h-14 w-14"
                        src="https://web.polines.ac.id/wp-content/uploads/2022/01/Logo-Polines-96dpi-200px.png"
                        alt="">
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="m-4 flex flex-col items-start md:min-w-[50vh]">
                        <span class="font-bold self-center md:self-start tracking-tight">Masukkan Username dan
                            Password</span>
                        <form action="{{ route('mahasiswa.index') }}" class="w-full">
                            <div class="form-control">
                                <label for="username" class="label">
                                    <span class="label-text">Username</span>
                                </label>
                                <input id="username" name="username" type="text" placeholder="NIM/NIP"
                                    class="input input-bordered rounded-2xl w-full" required />
                            </div>
                            <table class="border-separate border-spacing-y-4 min-w-full">
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
                                <button class="text-white bg-blue-plain btn border-none hover:bg-blue-light">Login</button>
                            </div>

                        </form>
                    </div>
                    <div class="m-4 flex-col items-start md:max-w-[50vh] text-justify hidden md:flex">
                        <span class="font-bold tracking-tighter mb-2">SIRATA (Sistem Informasi Surat Terpadu)<br>Politeknik
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
