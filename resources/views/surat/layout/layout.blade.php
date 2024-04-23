<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            width: 21cm;
            /* F4 paper width */
            height: 33cm;
            /* F4 paper height */
            margin: 0 auto;
        }
    </style>

    <title>@yield('title')</title>
</head>

<body class="font-surat px-[3cm] py-[5cm]">
    @yield('content')
</body>

</html>
