@extends('layout.layout')

@section('title', 'Create Fill')

@section('content')
    <h1>Hello Isi Form</h1>
    <form method="POST" action="">

        @csrf
        @method("POST")

        <div>
            <label for="nama_pengaju">Nama Pengaju : </label>
            <input id="nama_pengaju" type="text" name="nama_pengaju" placeholder="Nama Pengaju">

            <label for="perihal">Perihal : </label>
            <input type="text" name="perihal" id="perihal" placeholder="Perihal">
            <br>

            <input class="btn" type="submit" value="submit">
        </div>
    </form>
@endsection
