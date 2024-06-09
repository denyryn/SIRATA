@extends('surat.layout.form_layout')

@section('form')
    <form id="surat_form" action="{{ route(Session::get('akses') . '.surat.form.store') }}" method="POST"
        enctype="multipart/form-data" class="w-[50vw]">
        @csrf
        @method('POST')

        <input type="number" id="id_kategori_surat" name="id_kategori_surat" hidden
            value="{{ $data_perihal->id_kategori_surat }}" />

        <div class="mb-5">
            <label for="nama_perihal" class="block mb-2 text-sm font-medium text-gray-900 ">
                Nama Perihal
            </label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="perihal" name="nama_perihal" placeholder="Masukkan Nama Perihal" required oninput="updateContent()"
                value="{{ $data_perihal->nama_perihal }}" />
        </div>

        <div class="mb-5">
            <label for="nama_tujuan" class="block mb-2 text-sm font-medium text-gray-900">
                Nama Tujuan
            </label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="nama_tujuan" name="nama_tujuan" placeholder="Masukkan Nama Tujuan" oninput="updateContent()" required
                value="{{ $data_perihal->nama_tujuan }}" />
        </div>

        <div class="mb-5">
            <label for="alamat_tujuan" class="block mb-2 text-sm font-medium text-gray-900">
                Alamat Tujuan
            </label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="alamat_tujuan" name="alamat_tujuan" placeholder="Masukkan Alamat Tujuan" oninput="updateContent()"
                required value="{{ $data_perihal->alamat_tujuan }}" />
        </div>

        <div class="mb-5">
            <label for="upper_body" class="block mb-2 text-sm font-medium text-gray-900">
                Upper Body
            </label>
            <textarea
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="upper_body" name="upper_body" cols="30" rows="3" placeholder="Masukkan Upper Body"
                onchange="updateContent()" required>{{ $data_perihal->upper_body }}</textarea>
        </div>

        {{-- <div class="mb-5">
                <label for="lower_body_part1" class="block mb-2 text-sm font-medium text-gray-900">
                    Lower Body 1
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="lower_body_part1" name="lower_body_part1" cols="30" rows="2" placeholder="Masukkan Lower Body"
                    oninput="updateContent()">
                </textarea>
            </div> --}}

        <div class="mb-5">
            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">
                Tanggal
            </label>
            <input type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="tanggal" name="tanggal" oninput="updateContent()" required>
        </div>

        <div class="flex flex-row items-center justify-between w-full">
            <div class="w-1/3 mb-5">
                <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900">
                    Waktu Mulai
                </label>
                <input type="time"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="jam_mulai" name="jam_mulai" oninput="updateContent()" required>
            </div>
            <span id="sd" class="mx-1 text-black"> &nbsp; s.d &nbsp; </span>
            <div id="jam_selesaiContainer" class="w-1/3 mb-5">
                <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900">
                    Waktu Selesai
                </label>
                <input type="time"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="jam_selesai" name="jam_selesai" oninput="updateContent()" required>
            </div>
            <div>
                <input type="checkbox" name="waktu_selesai_null" id="waktu_selesai_null" checked="checked"
                    oninput="updateContent()">
            </div>
        </div>

        <div class="mb-5">
            <label for="peserta" class="block mb-2 text-sm font-medium text-gray-900">
                Peserta
            </label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="peserta" name="peserta" oninput="updateContent()" required>
        </div>

        <div class="mb-5">
            <label for="id_user1" class="block mb-2 text-sm font-medium text-gray-900 ">
                Pengaju
            </label>
            <div class="flex flex-row items-end w-full">
                <div id="pengajuContainer" class="flex flex-col w-full">
                    <div name="pemohon1"
                        class="mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 p-2.5">

                        @if (Session::get('akses') == 'dosen')
                            <select
                                class="id_user bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                name="id_user1" id="id_user1" disabled required>
                                <option value="">Pilih Pengaju Utama</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_user }}"
                                        {{ $dosen->id_user == $user_sekarang->id_user ? 'selected' : 'hidden' }}>
                                        {{ $dosen->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <select
                                class="id_user bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                                name="id_user1" id="id_user1" required>
                                <option value="">Pilih Pengaju Utama</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_user }}">
                                        {{ $dosen->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                </div>
                <button class="mb-2 ml-1 text-xl text-white btn bg-blue-light hover:bg-blue-plain" type="button"
                    id="removePengajuBtn"> - </button>
                <button class="mb-2 ml-1 text-xl text-white btn bg-blue-light hover:bg-blue-plain" type="button"
                    id="addPengajuBtn"> + </button>
            </div>
        </div>

        <div class="mb-5">
            <label for="lower_body_part" class="block mb-2 text-sm font-medium text-gray-900">
                Lower Body
            </label>
            <textarea
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="lower_body_part" name="lower_body_part" cols="30" rows="2" placeholder="Masukkan Lower Body"
                onchange="updateContent()"></textarea>
        </div>

        <div class="mb-5">
            <label for="id_jabatan" class="block mb-2 text-sm font-medium text-gray-900 ">
                Jabatan
            </label>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                name="id_jabatan" id="id_jabatan" onchange="updateContent()" required">
                <option value="">Pilih Jabatan pengaju</option>
                @foreach ($jabatans as $jabatan)
                    <option value="{{ $jabatan->id_jabatan }}" data-nama_jabatan="{{ $jabatan->nama_jabatan }}"
                        data-pemilik_jabatan="{{ $jabatan->dosen->nama_dosen ?? 'ini_nama' }}"
                        data-nip_jabatan="{{ $jabatan->dosen->nip ?? 'ini_nip' }}">
                        {{ $jabatan->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="lampiran" class="block mb-2 text-sm font-medium text-gray-900">
                lampiran
            </label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                type="file" accept="application/pdf" name="lampiran" id="lampiran">
        </div>
        <div>
            <textarea hidden id="lower_body" name="lower_body"></textarea>
        </div>

        <button type="submit" onmouseover="updateContent()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full h-12 px-5 py-2.5 text-center">Submit</button>
    </form>
@endsection

