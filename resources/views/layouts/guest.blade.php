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

    <!-- Top Right Image -->
    <div class="absolute top-0 right-5 m-0">
            <img src="https://images.squarespace-cdn.com/content/v1/652f0dca21259e4fce8eed05/f0913a9e-4ba7-4f28-9282-82f931bcbf7f/SwingingInsta.gif" 
                alt="Swinging Insta" 
                class="w-80 h-80">
        </div>


        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" 
         style="background-color: rgb(90, 132, 255);">





    <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" 
     style="background-image: url('https://media.istockphoto.com/id/1586395999/vector/white-gray-smooth-grainy-gradient-background-website-header-backdrop-noise-texture-effect.jpg?s=612x612&w=0&k=20&c=33LCk78ojHQysDr9RQ83_Zzq7gedr8xukDCQTDrYWvo='); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;"> -->

            <div>
                <!-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> -->
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg" 
               
                >
                {{ $slot }}
            </div>
        </div>
    </body>
</html>


<!-- Login  BG  ui -->
<!-- style="background-color: rgba(255, 182, 193, 0.7);" -->