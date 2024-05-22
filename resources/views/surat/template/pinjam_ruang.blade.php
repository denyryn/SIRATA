@extends('surat.layout.layout')

@section('title', 'Permohonan Magang')

@section('content')
    <table class="tabel-rata">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>
                    Nomor
                </td>
                <td>
                    :
                </td>
                <td>
                    <span>
                        {!! isset($data_surat['surat']->nomor_surat) ? $data_surat['surat']->nomor_surat : '...........' !!}
                    </span>
                </td>
                <td style="text-align: right;">
                    <span>
                        {!! isset($data_surat['tanggal_surat'])
                            ? $data_surat['tanggal_surat']
                            : (isset($tanggal_sekarang)
                                ? $tanggal_sekarang
                                : '...........') !!}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Hal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="perihalContent">
                        {!! isset($data_surat['surat']->nama_perihal)
                            ? $data_surat['surat']->nama_perihal
                            : (isset($data_perihal->nama_perihal)
                                ? $data_perihal->nama_perihal
                                : '...........') !!}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <div style="padding-top: 0.5cm;"></div>

    <div>
        <span id="namaTujuanContent" style="margin-top: 0;">
            {!! isset($data_surat['surat']->nama_tujuan)
                ? $data_surat['surat']->nama_tujuan
                : (isset($data_perihal->nama_tujuan)
                    ? $data_perihal->nama_tujuan
                    : '...........') !!}
        </span>
        <br>
        <span id="alamatTujuanContent" style="margin-top: 0;">
            {!! isset($data_surat['surat']->alamat_tujuan)
                ? $data_surat['surat']->alamat_tujuan
                : (isset($data_perihal->alamat_tujuan)
                    ? $data_perihal->alamat_tujuan
                    : '...........') !!}
        </span>
    </div>

    <div style="padding-top: 0.5cm;"></div>

    <p id="upperBodyContent" style="text-align: justify;">
        {!! isset($data_surat['surat']->upper_body)
            ? $data_surat['surat']->upper_body
            : (isset($data_perihal->upper_body)
                ? $data_perihal->upper_body
                : '...........') !!}
    </p>

    <div style="padding-top: 0.1cm;"></div>

    <div id="lowerBodyContent">
        {!! isset($data_surat['surat']->lower_body)
            ? $data_surat['surat']->lower_body
            : (isset($data_perihal->lower_body)
                ? $data_perihal->lower_body
                : '...........') !!}
        {{-- <table style="padding-left: 1cm" class="tabel-rata">
            <tr>
                <td>
                    Hari/Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="hariTanggalContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Jam
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="jamMulaiContent">

                    </span>
                    <span>
                        s.d
                    </span>
                    <span id="jamSelesaiContent">

                    </span>
                    <span>
                        WIB
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Tempat
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="tempatContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Acara
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="acaraContent">

                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    Perlengkapan
                </td>
                <td>
                    :
                </td>
                <td>
                    <span id="perlengkapanContent">

                    </span>
                </td>
            </tr>
        </table>

        <div style="padding-top: 0.1cm;"></div>

        <div>
            <div>
                <p id="lowerBodyPartContent">

                </p>
            </div>
        </div> --}}
    </div>

    <div style="padding-top: 0.3cm;"></div>

    <div style="width: 50%; margin-left: auto;">
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
                <td>{!! isset($data_surat['nama_jabatan']) ? $data_surat['nama_jabatan'] : 'Ketua Jurusan ..........' !!},</td>
            </tr>
            <tr>
                <td>
                    <div style="padding: 1cm;"></div>
                </td>
            </tr>
            <tr>
                <td>
                    {!! isset($data_surat['pemilik_jabatan']->nama_dosen)
                        ? $data_surat['pemilik_jabatan']->gelar_depan .
                            ' ' .
                            ucwords(strtolower($data_surat['pemilik_jabatan']->nama_dosen)) .
                            ' ' .
                            $data_surat['pemilik_jabatan']->gelar_belakang
                        : '...........' !!}
                </td>
            </tr>
            <tr>
                <td>
                    NIP. {!! isset($data_surat['pemilik_jabatan']->nip) ? $data_surat['pemilik_jabatan']->nip : '...........' !!}
                </td>
            </tr>
        </table>
    </div>
@endsection

