@extends('surat.layout.layout')

@section('title', 'Pengantar')

@section('content')
    <table class="tabel-rata">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @if (isset($data_surat['surat']->lampiran))
                <tr>
                    <td>
                        Lampiran
                    </td>
                    <td> : </td>
                    <td>
                        1
                    </td>
                </tr>
            @endif
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

    <div class="p-[0.5cm]"></div>

    <div>
        <p id="nama_tujuanContent">
            {!! isset($data_surat['surat']->nama_tujuan)
                ? $data_surat['surat']->nama_tujuan
                : (isset($data_perihal->nama_tujuan)
                    ? $data_perihal->nama_tujuan
                    : '...........') !!}
        </p>
        <p id="alamat_tujuanContent">
            {!! isset($data_surat['surat']->alamat_tujuan)
                ? $data_surat['surat']->alamat_tujuan
                : (isset($data_perihal->alamat_tujuan)
                    ? $data_perihal->alamat_tujuan
                    : '...........') !!}
        </p>
    </div>

    <div class="p-[0.5cm]"></div>

    <p id="upper_bodyContent">
        {!! isset($data_surat['surat']->upper_body)
            ? $data_surat['surat']->upper_body
            : (isset($data_perihal->upper_body)
                ? $data_perihal->upper_body
                : '...........') !!}
    </p>

    <div class="p-[0.3cm]"></div>

    <div id="lower_bodyContent">
        {!! isset($data_surat['surat']->lower_body)
            ? $data_surat['surat']->lower_body
            : (isset($data_perihal->lower_body)
                ? $data_perihal->lower_body
                : '...........') !!}
    </div>

    <div class="p-[0.3cm]"></div>

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

