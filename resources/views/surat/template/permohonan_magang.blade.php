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
                    {!! isset($data_surat->nomor_surat) ? $data_surat->nomor_surat : '...........' !!}
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
                    {!! isset($data_perihal->nama_perihal) ? $data_perihal->nama_perihal : '...........' !!}
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
                        {!! isset($data_perihal->nama_tujuan) ? $data_perihal->nama_tujuan : '...........' !!}
                    </p>
                </td>
            </tr>
        </table>
        <p id="alamatTujuanContent">
            {!! isset($data_perihal->alamat_tujuan) ? $data_perihal->alamat_tujuan : '...........' !!}
        </p>
    </div>

    <div class="p-[0.5cm]"></div>

    <p id="upperBodyContent">
        {!! isset($data_perihal->upper_body) ? $data_perihal->upper_body : '...........' !!}
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
                    <!-- foreach($data as $row) -->
                    <tr class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm]">
                        <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                            {!! $no !!}
                        </td>
                        <td id="namaContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                            {!! isset($surat->nama) ? $surat->nama : '...........' !!}
                        </td>
                        <td id="nimContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                            {!! isset($surat->nim) ? $surat->nim : '...........' !!}
                        </td>
                        <td id="programStudiContentElement" class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                            {!! isset($surat->program_studi) ? $surat->program_studi : '...........' !!}
                        </td>
                    </tr>
                    <!-- endforeach -->
                </tbody>
            </table>
        </div>

    </div>

    <div class="p-[0.3cm]"></div>

    <div>
        <p id="lowerBodyContent">
            {!! isset($data_perihal->lower_body) ? $data_perihal->lower_body : '...........' !!}
        </p>
    </div>

    <div class="p-[0.3cm]"></div>

    <div class="flex justify-end">
        <table>
            <tr>
                <td>Semarang,
                    {!! isset($surat->date) ? $surat->date : (isset($tanggal_sekarang) ? $tanggal_sekarang : '...........') !!}
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
                    {!! isset($surat->nama[0]) ? $surat->nama[0] : '...........' !!}
                </td>
            </tr>
            <tr>
                <td>
                    NIM. {!! isset($surat->nim[0]) ? $surat->nim[0] : '...........' !!}
                </td>
            </tr>
        </table>
    </div>
@endsection

