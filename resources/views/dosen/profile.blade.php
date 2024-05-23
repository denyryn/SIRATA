@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="">
        <div class="flex items-center justify-start w-full h-10 rounded-lg ps-12 bg-blue-light">
            <span class="text-white">Profil Pengguna</span>
        </div>
        <div class="flex flex-col-reverse justify-between text-sm md:items-center md:flex-row">
            <div class="pt-3 pb-10 text-black ps-12">
                <table>
                    <tr>
                        <td class="py-2">Nama</td>
                        <td class="py-2">:</td>
                        <td class="py-2">{{ $data_dosen->nama_dosen ? $data_dosen->nama_dosen : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">NIP</td>
                        <td class="py-2">:</td>
                        <td class="py-2">{{ $data_dosen->nip ? $data_dosen->nip : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">Golongan</td>
                        <td class="py-2">:</td>
                        <td class="py-2">{{ $data_dosen->golongan ? $data_dosen->golongan : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">Program Studi &nbsp&nbsp&nbsp&nbsp</td>
                        <td class="py-2">: &nbsp&nbsp&nbsp&nbsp</td>
                        <td class="py-2">
                            {{ $data_dosen->program_studi->nama_prodi ? $data_dosen->program_studi->nama_prodi : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">Jurusan</td>
                        <td class="py-2">:</td>
                        <td class="py-2">Teknik Elektro</td>
                    </tr>
                    <tr>
                        <td class="py-2">Email</td>
                        <td class="py-2">:</td>
                        <td class="py-2">{{ $data_dosen->user->email ? $data_dosen->user->email : '-' }}</td>
                    </tr>
                </table>
            </div>
            <div class="flex flex-col items-center justify-center md:items-none md:pe-12">
                <div class="py-5 md:pb-5">
                    <img class="rounded-sm size-40"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                        alt="Blank_profile">
                </div>
                <button
                    class="w-full py-2 text-white duration-100 ease-in-out rounded-md bg-blue-light hover:bg-blue-plain animate-none">
                    Edit Profile
                </button>
            </div>
        </div>

        <div class="flex items-center justify-start w-full h-10 rounded-lg ps-12 bg-blue-light">
            <span class="text-white">Akun SIRATA</span>
        </div>
        <div class="pt-3 pb-10 text-sm text-black">
            <div class="ps-12">
                <table>
                    <tr>
                        <td class="py-2">Username &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td class="py-2">: &nbsp&nbsp&nbsp&nbsp</td>
                        <td class="py-2">{{ $data_dosen->user->username }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">Hak Akses</td>
                        <td class="py-2">:</td>
                        <td class="py-2">{{ $data_dosen->user->akses }}</td>
                    </tr>
                    <tr>
                        <td class="py-2">Password</td>
                        <td class="py-2">:</td>
                        <td class="py-2"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

