<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased pt-24">
        @include('layouts.navigation')

        @if(session()->has('success'))
            <section class="my-4 px-4 py-2">
                <article class="border-2 border-teal-600 bg-teal-400 bg-opacity-50 text-teal-800 font-bold px-4 py-2 rounded">
                    {{ session()->get('success') }}
                </article>
            </section>
        @endif

        <main>
            {{ $slot }}
        </main>
        @livewireScripts

@stack('scripts')
    </body>
</html>
