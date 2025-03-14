<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" 
     style="background-image: url('https://cdn.myportfolio.com/a7dcc6d5ac1134b2d40ac6d1c5552304/1f0a0456-b934-4f28-beee-c47de7308667_rw_1920.gif?h=5ecc8b473e70030b5e3d8b8ef826ca1c'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;">

            <div>
                <!-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> -->
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" 
                style="background-color: rgba(255, 182, 193, 0.7);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>


<!-- Login  BG  ui -->