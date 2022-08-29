<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->

        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased"   >

    
        <div class="min-h-screen bg-gray-100 m-0"  style="background: url('/images/2.jpg')"  >

        <div class="min-h-screen bg-gray-100 m-0 bg">

            <main >
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
