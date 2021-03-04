<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('app.css', 'dist')) }}">
        @livewireStyles
        @stack('style')

        <!-- Scripts -->
        <script src="{{ url(mix('app.js', 'dist')) }}" defer></script>
    </head>

    <body class="@yield('bodyStyle')">

    @yield('body')

    @livewireScripts
    @stack('script')
    </body>
</html>
