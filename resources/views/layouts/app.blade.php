<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- livewire -->
        @livewireStyles
        <title>{{ $titlePage ?? 'Larastup' }}</title>
    </head>
    <body>
        @include('partials.header-app')

        <main>
            @yield('content-app')
        </main>

        @include('partials.footer-app')
        <!-- livewire -->
        @livewireScripts
    </body>
</html>