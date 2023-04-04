<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>DevStagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100">
        <header class="p-5 bg-white border-b-8 shadow">
            
            <div class="container flex items-center justify-between mx-auto">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>

                <nav class="flex items-center gap-2">
                    <a class="text-sm font-bold text-gray-600 uppercase" href="#">Login</a>
                    <a class="text-sm font-bold text-gray-600 uppercase" href="#">Criar Conta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="mb-10 text-3xl font-black text-center">
                @yield('titulo')
            </h2>
            @yield('conteudo')
        </main>

        <footer class="p-5 font-bold text-center text-gray-500 uppercase">
            Devstagram - Todos os direitos reservados @php echo date('Y'); @endphp
        </footer>
        <?php echo date('Y'); ?>

        {{ now()->year }}
    </body>
</html>
