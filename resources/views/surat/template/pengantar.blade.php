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
            <p id="perihalContent"></p>
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
                {{ isset($surat->kaprodi) ? $surat->kaprodi : '...........' }}
            </td>
        </tr>
    </table>
    <p>Politeknik Negeri Semarang</p>
</div>

<div class="p-[0.5cm]"></div>

<p id="bodyContent"></p>

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
                        {{ $no }}
                    </td>
                    <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                        {{ isset($surat->nama) ? $surat->nama : '...........' }}
                    </td>
                    <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                        {{ isset($surat->nim) ? $surat->nim : '...........' }}
                    </td>
                    <td class="border px-[0.1cm] py-[0.1cm] ps-[0.2cm] text-center">
                        {{ isset($surat->program_studi) ? $surat->program_studi : '...........' }}
                    </td>
                </tr>
                <!-- endforeach -->
            </tbody>
        </table>
    </div>

</div>

<div class="p-[0.3cm]"></div>

<div>
    <p id="lowerContent"></p>
</div>

<div class="p-[0.3cm]"></div>

<div class="flex justify-end">
    <table>
        <tr>
            <td>Semarang, {{ isset($surat->date) ? $surat->date : '...........' }}
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
                {{ isset($surat->nama[0]) ? $surat->nama[0] : '...........' }}
            </td>
        </tr>
        <tr>
            <td>
                NIM. {{ isset($surat->nim[0]) ? $surat->nim[0] : '...........' }}
            </td>
        </tr>
    </table>
</div>
@endsection