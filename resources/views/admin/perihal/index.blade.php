@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="flex justify-end">
            <!-- Button untuk trigger modals, modals harus diinclude (di bawah) -->
            <a href="{{ route('perihal.create') }}" class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-700"
                type="button">
                Tambah Perihal
            </a>
        </div>

        {{-- Menampilkan Data Program Studi --}}
        <table class="table text-black table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori Surat</th>
                    <th>Template</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_perihal->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($data_perihal as $perihal)
                        <tr>
                            <td>{{ $perihal->id_perihal }}</td>
                            <td>{{ $perihal->nama_perihal }}</td>
                            <form class="w-full" method="POST" action="{{ route('perihal.delete', $perihal->id_perihal) }}">
                                @csrf
                                @method('DELETE')

                                <td class="grid grid-cols-2">
                                    <a class="m-2 text-white bg-blue-600 btn no-animation hover:bg-blue-400"
                                        href="{{ route('perihal.edit', $perihal->id_perihal) }}">
                                        Edit
                                    </a>

                                    <button type="submit"
                                        class="m-2 text-white bg-red-600 btn no-animation hover:bg-red-700"
                                        onclick="return confirm('Confirm delete?')">Delete</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
