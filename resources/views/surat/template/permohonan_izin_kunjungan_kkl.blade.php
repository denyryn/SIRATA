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
                <td>Pemohon,</td>
            </tr>
            <tr>
                <td>
                    <div class="p-[1cm]"></div>
                </td>
            </tr>
            <tr>
                <td>
                    {!! isset($data_surat['data_pemohons'][0]['identitas']->nama_mahasiswa)
                        ? $data_surat['data_pemohons'][0]['identitas']->nama_mahasiswa
                        : '...........' !!}
                </td>
            </tr>
            <tr>
                <td>
                    NIM. {!! isset($data_surat['data_pemohons'][0]['identitas']->nim)
                        ? $data_surat['data_pemohons'][0]['identitas']->nim
                        : '...........' !!}
                </td>
            </tr>
        </table>
    </div>
@endsection