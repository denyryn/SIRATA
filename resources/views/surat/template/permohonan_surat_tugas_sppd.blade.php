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

    <div style="padding-top: 0.5cm;"></div>

    <div>
        <span id="nama_tujuanContent" style="margin-top: 0;">
            {!! isset($data_surat['surat']->nama_tujuan)
                ? $data_surat['surat']->nama_tujuan
                : (isset($data_perihal->nama_tujuan)
                    ? $data_perihal->nama_tujuan
                    : '...........') !!}
        </span>
        <br>
        <span id="alamat_tujuanContent" style="margin-top: 0;">
            {!! isset($data_surat['surat']->alamat_tujuan)
                ? $data_surat['surat']->alamat_tujuan
                : (isset($data_perihal->alamat_tujuan)
                    ? $data_perihal->alamat_tujuan
                    : '...........') !!}
        </span>
    </div>

    <div style="padding-top: 0.5cm;"></div>

    <div id="upper_bodyContent">
        {!! isset($data_surat['surat']->upper_body)
            ? $data_surat['surat']->upper_body
            : (isset($data_perihal->upper_body)
                ? $data_perihal->upper_body
                : '...........') !!}
    </div>

    <div>
        <div style="background-color: #fff;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <th style="border: 1px solid #000; padding: 0.1cm;">No.</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Nama</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Gol.</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">NIP</th>
                </thead>
                <tbody>
                    @if (isset($data_surat))
                        @foreach ($data_surat['data_pemohons'] as $pemohon)
                            <tr style="border: 1px solid #000; padding: 0.1cm;">
                                <td style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! $no++ !!}</td>
                                <td id="namaContent" style="border: 1px solid #000; padding: 0.1cm; text-align: left;">
                                    {!! isset($pemohon['identitas']->nama_dosen)
                                        ? ucwords(strtolower($pemohon['identitas']->nama_dosen))
                                        : '...........' !!}
                                </td>
                                <td id="golonganContent"
                                    style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->golongan) ? $pemohon['identitas']->golongan : '...........' !!}
                                </td>
                                <td id="nipContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->nip) ? $pemohon['identitas']->nip : '...........' !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="border: 1px solid #000; padding: 0.1cm;">
                            <td style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                {!! $no++ !!}
                            </td>
                            <td id="namaContent" style="border: 1px solid #000; padding: 0.1cm; text-align: justify;">
                                ...........</td>
                            <td id="golonganContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                ...........</td>
                            <td id="nipContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                ...........</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <div style="padding-top: 0.5cm;"></div>

    <div id="lower_bodyContent">
        {!! isset($data_surat['surat']->lower_body)
            ? $data_surat['surat']->lower_body
            : (isset($data_perihal->lower_body)
                ? $data_perihal->lower_body
                : '...........') !!}
    </div>

    <div style="padding-top: 0.3cm;"></div>

    <div>
        <div style="float: left; width: 48%; margin-right: 2%;">
            <table style="width: 100%;">
                <tr>
                    <td>{!! 'Kaprodi STr Teknologi Rekayasa Komputer' !!},</td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1cm;"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! isset($data_surat['kaprodi-trk_statis'])
                            ? (isset($data_surat['kaprodi-trk_statis']->dosen->gelar_depan)
                                    ? $data_surat['kaprodi-trk_statis']->dosen->gelar_depan
                                    : '') .
                                ' ' .
                                ucwords(
                                    strtolower(
                                        isset($data_surat['kaprodi-trk_statis']->dosen->nama_dosen)
                                            ? $data_surat['kaprodi-trk_statis']->dosen->nama_dosen
                                            : '',
                                    ),
                                ) .
                                ' ' .
                                (isset($data_surat['kaprodi-trk_statis']->dosen->gelar_belakang)
                                    ? $data_surat['kaprodi-trk_statis']->dosen->gelar_belakang
                                    : '')
                            : '...........' !!}
                    </td>
                </tr>
                <tr>
                    <td>
                        NIP. {!! isset($data_surat['kaprodi-trk_statis']->dosen->nip)
                            ? $data_surat['kaprodi-trk_statis']->dosen->nip
                            : '...........' !!}
                    </td>
                </tr>
            </table>
        </div>
        <div style="float: left; width: 48%;">
            <table style="width: 100%;">
                <tr>
                    <td>{!! 'Kaprodi Teknik Informatika' !!},</td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1cm;"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        {!! isset($data_surat['kaprodi-ti_statis'])
                            ? (isset($data_surat['kaprodi-ti_statis']->dosen->gelar_depan)
                                    ? $data_surat['kaprodi-ti_statis']->dosen->gelar_depan
                                    : '') .
                                ' ' .
                                ucwords(
                                    strtolower(
                                        isset($data_surat['kaprodi-ti_statis']->dosen->nama_dosen)
                                            ? $data_surat['kaprodi-ti_statis']->dosen->nama_dosen
                                            : '',
                                    ),
                                ) .
                                ' ' .
                                (isset($data_surat['kaprodi-ti_statis']->dosen->gelar_belakang)
                                    ? $data_surat['kaprodi-ti_statis']->dosen->gelar_belakang
                                    : '')
                            : '...........' !!}
                    </td>
                </tr>
                <tr>
                    <td>
                        NIP. {!! isset($data_surat['kaprodi-ti_statis']->dosen->nip)
                            ? $data_surat['kaprodi-ti_statis']->dosen->nip
                            : '...........' !!}
                    </td>
                </tr>
            </table>
        </div>
        <div style="clear: both;"></div>
    </div>

@endsection

