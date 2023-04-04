<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('titulo')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <h1 class="text-4xl font-extrabold">@yield('titulo')</h1>


        <hr>

        <h1 class="text-">treta</h1>

        <hr>
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        <hr>
        @yield('conteudo')
    </body>
</html>
