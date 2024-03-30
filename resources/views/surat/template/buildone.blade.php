@extends('surat.layout.layout')

@section('title', 'Pengantar')

@section('content')
    <table>
        <tr>
            <td>
                Perihal
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp
            </td>
            <td>
                <$perihal>
            </td>
        </tr>
    </table>
    <div class="p-[0.5cm]"></div>
    <div>
        <table>
            <tr>
                <td>
                    Yth. Kaprodi &nbsp&nbsp
                </td>
                <td>
                    <$kaprodi>
                </td>
            </tr>
        </table>
        <p>Politeknik Negeri Semarang</p>
    </div>
    <div class="p-[0.5cm]"></div>
    <p>
        Dengan ini mohon dibuatkan surat pengantar <$perihal> atas nama mahasiswa di bawah ini :
    </p>
    <div class="p-[0.3cm]"></div>
    <div class="bg-white border-gray-200">
        <table border="1" class="w-full whitespace-no-wrap whitespace-no-wrapw-full">
            <thead>
                <th class="border px-[0.1cm] py-[0.1cm]">No.</th>
                <th class="border px-[0.1cm] py-[0.1cm]">Nama</th>
                <th class="border px-[0.1cm] py-[0.1cm]">NIM</th>
                <th class="border px-[0.1cm] py-[0.1cm]">Program Studi</th>
            </thead>
            <tbody>
                <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                    foreach no++
                </td>
                <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                    <$nama>
                </td>
                <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                    <$nim>
                </td>
                <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                    <$program_studi>
                </td>
            </tbody>
        </table>
    </div>
    <div class="p-[0.3cm]"></div>
    <div>
        <p>
            <$lampiran>
        </p>
    </div>
    <div class="p-[0.3cm]"></div>
    <div class="flex justify-end">
        <table>
            <tr>
                <td>Semarang, <$date>
                </td>
            </tr>
            <tr>
                <td>Pemohon,</td>
            </tr>
            <tr>
                <td>
                    <div class="p-[1cm]"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <$nama_pengaju>
                </td>
            </tr>
            <tr>
                <td>
                    NIM. <$nim>
                </td>
            </tr>
        </table>
    </div>
@endsection
