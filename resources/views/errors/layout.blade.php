<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>

</head>

<body class="font-poppins">
    <div class="grid h-screen px-4 bg-white place-content-center">
        <div class="text-center">
            <h1 class="font-black text-gray-200 text-9xl">@yield('code')</h1>

            <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">Uh-oh!</p>

            <p class="mt-4 text-gray-500">@yield('message')</p>

            <a href="#"
                class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white rounded-lg animate-none btn bg-blue-light hover:bg-blue-plain focus:outline-none focus:ring">
                Go Back to Dashboard
            </a>
        </div>
    </div>
</body>

</html>

