<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>

<body class="font-poppins">
    <div class="grid h-screen grid-cols-1 px-4 bg-white md:grid-cols-2">
        <div class="items-center justify-center md:flex">
            <img src="@yield('image')" alt="Error Image" class="mx-auto w-80 md:mx-0">
        </div>
        <div class="flex flex-col justify-center">
            <div class="text-center md:text-left">
                <h1 class="font-black text-blue-light text-9xl">@yield('code')</h1>

                <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">Uh-oh!</p>

                <p class="mt-4 text-gray-500">@yield('message')</p>
            </div>
        </div>
    </div>
</body>

</html>

