@extends('surat.layout.layout')

@section('title', 'Pengantar')

@section('content')
    <table class="tabel-rata">
        <tr>
            <td>Perihal</td>
            <td> : </td>
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

    <div style="padding-top: 0.1cm;"></div>

    <div>
        <span id="namaTujuanContent">
            {!! isset($data_surat['surat']->nama_tujuan)
                ? $data_surat['surat']->nama_tujuan
                : (isset($data_perihal->nama_tujuan)
                    ? $data_perihal->nama_tujuan
                    : '...........') !!}
        </span>
        <br>
        <apan id="alamatTujuanContent" style="margin: 0;">
            {!! isset($data_surat['surat']->alamat_tujuan)
                ? $data_surat['surat']->alamat_tujuan
                : (isset($data_perihal->alamat_tujuan)
                    ? $data_perihal->alamat_tujuan
                    : '...........') !!}
        </apan>
    </div>

    <div style="padding-top: 0.5cm;"></div>

    <p id="upperBodyContent" style="text-align: justify;">
        {!! isset($data_surat['surat']->upper_body)
            ? $data_surat['surat']->upper_body
            : (isset($data_perihal->upper_body)
                ? $data_perihal->upper_body
                : '...........') !!}
    </p>

    <div style="padding-top: 0.3cm;"></div>

    <div>
        <div style="background-color: #fff;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <th style="border: 1px solid #000; padding: 0.1cm;">No.</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Nama</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">NIM</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Program Studi</th>
                </thead>
                <tbody>
                    @if (isset($data_surat))
                        @foreach ($data_surat['data_pemohons'] as $pemohon)
                            <tr style="border: 1px solid #000; padding: 0.1cm;">
                                <td style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! $no++ !!}</td>
                                <td id="namaContentElement"
                                    style="border: 1px solid #000; padding: 0.1cm; text-align: left;">
                                    {!! isset($pemohon['identitas']->nama_mahasiswa)
                                        ? ucwords(strtolower($pemohon['identitas']->nama_mahasiswa))
                                        : '...........' !!}
                                </td>
                                <td id="nimContentElement"
                                    style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->nim) ? $pemohon['identitas']->nim : '...........' !!}
                                </td>
                                <td id="programStudiContentElement"
                                    style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['data_prodi']->nama_prodi) ? $pemohon['data_prodi']->nama_prodi : '...........' !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="border: 1px solid #000; padding: 0.1cm;">
                            <td style="border: 1px solid #000; padding: 0.1cm; text-align: center;">{!! $no++ !!}
                            </td>
                            <td id="namaContentElement"
                                style="border: 1px solid #000; padding: 0.1cm; text-align: justify;">...........</td>
                            <td id="nimContentElement" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                ...........</td>
                            <td id="programStudiContentElement"
                                style="border: 1px solid #000; padding: 0.1cm; text-align: center;">...........</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <div style="padding-top: 0.3cm;"></div>

    <div>
        <p id="lowerBodyContent" style="text-align: justify;">
            {!! isset($data_surat['surat']->lower_body)
                ? $data_surat['surat']->lower_body
                : (isset($data_perihal->lower_body)
                    ? $data_perihal->lower_body
                    : '...........') !!}
        </p>
    </div>

    <div style="padding-top: 0.3cm;"></div>

    <div style="margin-left: 50%">
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
                    <div style="padding: 1cm;"></div>
                </td>
            </tr>
            <tr>
                <td id="namaPengajuContent">
                    {!! isset($data_surat['data_pemohons'][0]['identitas']->nama_mahasiswa)
                        ? ucwords(strtolower($data_surat['data_pemohons'][0]['identitas']->nama_mahasiswa))
                        : '...........' !!}
                </td>
            </tr>
            <tr>
                <td id="nimPengajuContent">
                    NIM. {!! isset($data_surat['data_pemohons'][0]['identitas']->nim)
                        ? $data_surat['data_pemohons'][0]['identitas']->nim
                        : '...........' !!}
                </td>
            </tr>
        </table>
    </div>
@endsection

