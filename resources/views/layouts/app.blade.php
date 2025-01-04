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
        @livewireStyles
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="font-sans antialiased bg-slate-100">
        <div class="flex">

            @livewire('sidebar')

            <div class="h-dvh flex-1 flex flex-col">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white border-b shadow z-40">
                        <div class="max-w-screen-2xl mx-auto p-4 flex gap-4 items-center">
                            <button class="hidden lg:block" onclick="Livewire.dispatch('toggledesktopsidebar')"><i class="fa-solid fa-sidebar"></i><i class="fa-solid fa-bars text-lg"></i></button>
                            <button class="lg:hidden" onclick="Livewire.dispatch('togglemobilesidebar')"><i class="fa-solid fa-bars text-lg"></i></button>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 lg:p-4 overflow-auto">
                    {{ $slot }}
                </main>
            </div>

        </div>

        @livewireScripts
    </body>
</html>
