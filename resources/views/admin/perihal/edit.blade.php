@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="grid grid-cols-12">
        <form action="{{ route('perihal.update', $data_perihal['id_perihal']) }}" method="POST"
            class="grid w-1/2 min-w-full col-start-1 col-end-6 grid-">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="nama_perihal" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Nama Perihal
                </label>
                <input type="text" id="nama_perihal"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="nama_perihal" placeholder="Masukkan Nama Perihal" value="{{ $data_perihal['nama_perihal'] }}"
                    required />
            </div>
            <div class="mb-5">
                <label for="id_kategori_surat" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Kategori
                </label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="id_kategori_surat" id="id_kategori_surat" required>
                    @foreach ($opsi_kategori as $id => $nama)
                        @if ($id == $data_perihal['id_kategori_surat'])
                            <option value="{{ $id }}" selected>{{ $nama }}</option>
                        @else
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endif
                    @endforeach
                </select>



            </div>
            <div class="mb-5">
                <label for="template" class="block mb-2 text-sm font-medium text-gray-900">
                    Template
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="template" name="template" cols="30" rows="10" placeholder="Masukkan Template">{{ $data_perihal['template'] }}
                </textarea>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        <iframe class="grid h-full min-w-full col-start-7 col-end-13 border-black shadow-md "
            srcdoc="{{ $renderedTemplate }}" frameborder="0"></iframe>

    </div>
@endsection
