<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            padding: 5cm 2cm 5cm 2cm;
            background-color: white;
        }

        .tabel-rata {
            width: 100%;
        }

        .tabel-rata tr td:first-child {
            width: 120px;
        }

        .tabel-rata tr td:nth-child(2) {
            width: 10px;
        }

        #upperBodyContent,
        #lowerBodyContent {
            line-height: 1.5;
        }

        #upperBodyContent br,
        #lowerBodyContent br {
            line-height: 0.25;
        }
    </style>

    <title>@yield('title')</title>

</head>

<body>
    @yield('content')
</body>

</html>

