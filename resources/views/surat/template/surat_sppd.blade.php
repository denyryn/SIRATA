@extends('surat.layout.layout')

@section('title', 'Pengantar')

@section('content')
    <table>
        <tr>
            <td>
                Nomor
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp
            </td>
            <td>
                <p>
                    {!! isset($data_surat['surat']->nomor_surat) ? $data_surat['surat']->nomor_surat : '...........' !!}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Hal
            </td>
            <td>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp
            </td>
            <td>
                <p id="perihalContent">
                    {!! isset($data_surat['surat']->nama_perihal)
                        ? $data_surat['surat']->nama_perihal
                        : (isset($data_perihal->nama_perihal)
                            ? $data_perihal->nama_perihal
                            : '...........') !!}
                </p>
            </td>
        </tr>
    </table>

    <div class="p-[0.5cm]"></div>

    <div>
        <table>
            <tr>
                <td>
                    <p id="namaTujuanContent">
                        {!! isset($data_surat['surat']->nama_tujuan)
                            ? $data_surat['surat']->nama_tujuan
                            : (isset($data_perihal->nama_tujuan)
                                ? $data_perihal->nama_tujuan
                                : '...........') !!}
                    </p>
                </td>
            </tr>
        </table>
        <p id="alamatTujuanContent">
            {!! isset($data_surat['surat']->alamat_tujuan)
                ? $data_surat['surat']->alamat_tujuan
                : (isset($data_perihal->alamat_tujuan)
                    ? $data_perihal->alamat_tujuan
                    : '...........') !!}
        </p>
    </div>

    <div class="p-[0.5cm]"></div>

    <p id="upperBodyContent">
        {!! isset($data_surat['surat']->upper_body)
            ? $data_surat['surat']->upper_body
            : (isset($data_perihal->upper_body)
                ? $data_perihal->upper_body
                : '...........') !!}
    </p>

    <div class="p-[0.3cm]"></div>

    <div>
        <div class="bg-white border-gray-200">
            <table border="1" class="w-full whitespace-no-wrap whitespace-no-wrapw-full">
                <thead>
                    <th class="border px-[0.1cm] py-[0.1cm]">No.</th>
                    <th class="border px-[0.1cm] py-[0.1cm]">Nama</th>
                    <th class="border px-[0.1cm] py-[0.1cm]">NIM</th>
                    <th class="border px-[0.1cm] py-[0.1cm]">Program Studi</th>
                </thead>
                <tbody>
                    @if (isset($data_surat))
                        @foreach ($data_surat['data_pemohons'] as $pemohon)
                            <tr class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                                <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                    {!! $no++ !!}
                                </td>
                                <td id="namaContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-justify">
                                    {!! isset($pemohon['identitas']->nama_mahasiswa) ? $pemohon['identitas']->nama_mahasiswa : '...........' !!}
                                </td>
                                <td id="nimContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                    {!! isset($pemohon['identitas']->nim) ? $pemohon['identitas']->nim : '...........' !!}
                                </td>
                                <td id="programStudiContentElement"
                                    class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                    {!! isset($pemohon['data_prodi']->nama_prodi) ? $pemohon['data_prodi']->nama_prodi : '...........' !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                            <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                {!! $no++ !!}
                            </td>
                            <td id="namaContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-justify">
                                ...........
                            </td>
                            <td id="nimContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                ...........
                            </td>
                            <td id="programStudiContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                                ...........
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <div class="p-[0.3cm]"></div>

    <div>
        <p id="lowerBodyContent">
            {!! isset($data_surat['surat']->lower_body)
                ? $data_surat['surat']->lower_body
                : (isset($data_perihal->lower_body)
                    ? $data_perihal->lower_body
                    : '...........') !!}
        </p>
    </div>

    <div class="p-[0.3cm]"></div>

    <div class="flex justify-end">
        <table>
            <tr>
                <td>Semarang,
                    {!! isset($data_surat['tanggal_surat'])
                        ? $data_surat['tanggal_surat']
                        : (isset($tanggal_sekarang)
                            ? $tanggal_sekarang
                            : '...........') !!}
                </td>
            </tr>
            <tr>
                <td>Ketua Jurusan Teknik Elektro,</td>
            </tr>
            <tr>
                <td>
                    <div class="p-[1cm]"></div>
                </td>
            </tr>
            <tr>
                <td>
                    {!! isset($data_surat['data_kajur'][0]['identitas']->nama_dosen)
                        ? $data_surat['data_kajur'][0]['identitas']->nama_dosen
                        : '...........' !!}
                </td>
            </tr>
            <tr>
                <td>
                    NIP. {!! isset($data_surat['data_kajur'][0]['identitas']->nip)
                        ? $data_surat['data_kajur'][0]['identitas']->nip
                        : '...........' !!}
                </td>
            </tr>
        </table>
    </div>
@endsection

