<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <title>Trying Layouting</title> --}}
    <title>@yield('title')</title>
</head>

<body class="font-poppins">
    <div class="p-4 content sm:ml-64">
        <h4>Data PRODI</h4>
        <table>
            <thead>
                <th>No</th>
                <th>Nama</th>
            </thead>
            <tbody>
                @foreach ($program_studi as $prodi)
                    <tr>
                        <td>{{ $prodi->id_prodi }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
