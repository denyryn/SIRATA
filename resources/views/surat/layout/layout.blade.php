<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 5cm 2cm 5cm 2cm;
            background-color: white;
        }

        .nomor-perihal {
            width: 100%;
        }

        .nomor-perihal tr td:first-child {
            width: 120px;
        }

        .nomor-perihal tr td:nth-child(2) {
            width: 10px;
        }
    </style>

    <title>@yield('title')</title>

</head>

<body>
    @yield('content')
</body>

</html>

