@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="">
        <iframe id="templateFrame"
            class="w-full h-screen border-black rounded-[0.5rem] overflow-scroll border-0 transform scale-100 align-middle mt-1"
            srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
    </div>
@endsection

