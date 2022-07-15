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
        @include('partials.header-private')

        <main mainprivate>
            <section sideleftmenu>
                @include('partials.nav-side-left-private')

                @include('partials.footer-private')
            </section>

            <section contentmain>
                @yield('content-private')
            </section>
        </main>

        <!-- livewire -->
        @livewireScripts
    </body>
</html>