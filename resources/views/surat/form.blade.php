@extends('layout.layout')

@section('title', 'Create Fill')
@section('header', 'SIRATA / Layanan Surat')

@section('content')
        {{-- Bar Pencarian Surat --}}
        <nav class="w-full bg-blue-500 h-12 rounded-xl p-3 items-center font-normal flex justify-center">
            <div class="searchbox">
                <form action="">
                    <input type="search" placeholder="Cari Template" class="rounded-x1 px-16 py-1 border focus:outline-none focus:border-blue-500 text-sm">
                </form>
            </div>
        </nav>

        {{-- Form Surat --}}
        <div class="container mx-auto mt-10">
            <form method="POST" action="" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
                @csrf
                @method("POST")
                <div class="mb-4">
                    <label for="nama_pengaju" class="block text-gray-700 font-semibold mb-2">Nama Pengaju :</label>
                    <input id="nama_pengaju" type="text" name="nama_pengaju" placeholder="Nama Pengaju" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="perihal" class="block text-gray-700 font-semibold mb-2">Perihal :</label>
                    <input type="text" name="perihal" id="perihal" placeholder="Perihal" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
