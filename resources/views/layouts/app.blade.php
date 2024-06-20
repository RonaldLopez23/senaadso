<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Minimercado')</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    {{-- navbar --}}
    @include('partials.navigation')
</header>
<main>
    {{-- Título Cabecera --}}
    <div class="bg-green-100 my-4 text-center">
        <h1 class="text-lg font-semibold m-4 uppercase">@yield('titulo')</h1>
    </div>
    {{-- Mensajes informativos --}}
    @if (session('info'))
        <div class="flex justify-end m-4">
            <div class="alert alert-info w-96">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 19.5a7.5 7.5 0 10-15 0 7.5 7.5 0 0015 0zm-7.5 0H3m0-7.5h.01M12 7.5a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                </svg>
                <span>{{ session('info') }}</span>
            </div>
        </div>
    @endif
    {{-- Contenido --}}
    @yield('contenido')
</main>
<footer class="footer footer-center p-4 bg-base-300 text-base-content">
    <div>
        <p>Copyright © 2024 - MiniMercado</p>
    </div>
</footer>
</body>
</html>
