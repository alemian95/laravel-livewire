<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Livewire</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-slate-100">

        <div id="welcome" class="min-h-dvh flex flex-col">

            <header>
                <p class="font-semibold text-xl">Welcome</p>
            </header>

            <main class="flex-1">
                Welcome to {{ config('app.name') }}!
            </main>

            <footer>
                <p class="text-center text-sm text-slate-600">&copy; {{ date('Y') }} - Laravel Livewire</p>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
