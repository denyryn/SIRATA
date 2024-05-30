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
            {{-- <tr>
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
            </tr> --}}
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
        {{-- <p id="hormatContent">
            Dengan Hormat, <br>
            Sehubungan dengan kunjungan industri dalam rangka perintisan kerjasama dengan dunia industri yang akan
            diselenggarakan pada:
        </p>

        <table class="tabel-rata">
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
                    Waktu
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
        </table>

        <p id="maksudContent">
            Kami bermaksud untuk mengajukan permohonan surat tugas kepada pimpinan Politeknik Negeri Semarang dengan rincian
            dosen sebagai berikut:
        </p> --}}
    </div>

    <div>
        <div style="background-color: #fff;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <th style="border: 1px solid #000; padding: 0.1cm;">No.</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Nama</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">NIP</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Gol.</th>
                    <th style="border: 1px solid #000; padding: 0.1cm;">Jabatan</th>
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
                                <td id="nipContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->nip) ? $pemohon['identitas']->nip : '...........' !!}
                                </td>
                                <td id="golonganContent"
                                    style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->golongan) ? $pemohon['identitas']->golongan : '...........' !!}
                                </td>
                                <td id="jabatanContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                    {!! isset($pemohon['identitas']->jabatan->nama_jabatan)
                                        ? $pemohon['identitas']->jabatan->nama_jabatan
                                        : 'Dosen Jurusan Teknik Elektro' !!}
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
                            <td id="nipContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                ...........</td>
                            <td id="golonganContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
                                ...........</td>
                            <td id="jabatanContent" style="border: 1px solid #000; padding: 0.1cm; text-align: center;">
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

