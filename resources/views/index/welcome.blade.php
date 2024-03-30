@extends('minimal_layout.layout')

@section('title', 'Welcome')

@section('content')
    <div class="min-h-screen text-xl font-bold hero "
        style="background-image: url('{{ asset('images/gedung-elektro.jpg') }}');">
        <div class="flex flex-col items-center justify-center h-screen bg-opacity-50 hero-overlay">
            <h1 class="block m-4 tracking-wider text-center text-white text sm:text-2xl">SELAMAT DATANG DI SIRATA<br>UNIT
                LAYANAN
                SURAT TERPADU<br>JURUSAN ELEKTRO POLITEKNIK NEGERI SEMARANG</h1>
            <a href="{{ route('welcome.login') }}"
                class="btn sm:m-5 h-[3vh] w-3/5 sm:w-1/4 rounded-2xl bg-blue-plain hover:bg-blue-light border-none text-white text-sm sm:text-lg ">
                Login
            </a>
        </div>
    </div>
@endsection
