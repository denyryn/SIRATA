@extends('surat.layout.layout')

@section('title', 'Pengantar')

@section('content')
    @isset($data_perihal['template'])
        {!! $data_perihal['template'] !!}
    @else
        @include('surat.template.error')
    @endisset
@endsection

{{--
    Ini adalah sistem penampilan template pada Admin
    untuk halaman edit dan create.
    Sistemnya developer akan membuat template surat
    menggunakan html dan css (disini sudah disediakan route('template.build'))
    isi dari html tersebut akan di-paste pada isian "template".

    Pertanyaannya : Apa yang di-paste?
    Jawaban: Pada halaman web terdapat  @section(content) {isi} @endsection

    @section(content)
    Isi web
    @endsection

    yang akan di-paste pada isian "template' adalah {isi} atau Isi web,
    jadi akan dimulai dengan tag dan diakhiri tag html juga.
    Ini masih konsep awal yang saya buat, atau mungkin ada konsep yang lebih baik?
    let me know (Deny Rianto)
--}}
