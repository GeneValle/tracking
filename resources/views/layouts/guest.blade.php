<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Tracking By ANDF') }}</title> --}}
        <title>Tracking By ANDF</title>
        <link rel="shortcut icon" href="{{ asset('img/ANDF_Tracking_LogoS.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bg-custom-purple {
                background-color: #9161f9;
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 bg-custom-purple antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
