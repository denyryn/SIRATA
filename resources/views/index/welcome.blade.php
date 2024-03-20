@extends('indexLayout.layout')

@section('title', 'Welcome')

@section('content')
<div class="text-xl font-bold flex justify-center items-center h-screen flex-col p-4">
    <h1 class="text-center block text-white text-sm sm:text-2xl">SELAMAT DATANG DI<br>UNIT LAYANAN SURAT TERPADU<br>JURUSAN ELEKTRO POLITEKNIK NEGERI SEMARANG</h1>
    <button class="btn m-2 w-2/5 sm:w-1/4 rounded-2xl bg-blue-plain hover:bg-blue-light border-none text-white text-sm sm:text-lg">
        Login
    </button>
</div>
@endsection
