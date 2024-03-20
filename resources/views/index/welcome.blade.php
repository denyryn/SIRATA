@extends('indexLayout.layout')

@section('title', 'Welcome')

@section('content')
    <div class="text-xl font-bold hero min-h-screen "
        style="background-image: url('{{ asset('images/gedung-elektro.jpg') }}');">
        <div class="hero-overlay bg-opacity-50 flex justify-center items-center h-screen flex-col">
            <h1 class="tracking-wider m-4 text-center block text-white text sm:text-2xl">SELAMAT DATANG DI<br>UNIT LAYANAN
                SURAT TERPADU<br>JURUSAN ELEKTRO POLITEKNIK NEGERI SEMARANG</h1>
            <a href="{{ route('welcome.login') }}"
                class="btn sm:m-5 h-[3vh] w-3/5 sm:w-1/4 rounded-2xl bg-blue-plain hover:bg-blue-light border-none text-white text-sm sm:text-lg ">
                Login
            </a>
        </div>
    </div>
@endsection
