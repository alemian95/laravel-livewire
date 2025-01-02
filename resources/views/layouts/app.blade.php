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
    </head>
    <body class="font-sans antialiased bg-slate-100">
        <div class="flex">
            @livewire('sidebar')

            <div class="min-h-dvh flex-1 flex flex-col">

                {{-- @include('layouts.navigation') --}}

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto p-6">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                        <button class="hidden lg:block" onclick="Livewire.dispatch('toggledesktopsidebar')">toggle sidebar</button>
                        <button class="lg:hidden" onclick="Livewire.dispatch('togglemobilesidebar')">toggle sidebar</button>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>

                <footer>
                    <p class="text-center text-sm text-slate-600">&copy; {{ date('Y') }} - Laravel Livewire</p>
                </footer>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
