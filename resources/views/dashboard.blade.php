<x-app-layout>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-8">
        <x-card class="max-w-screen-2xl mx-auto">
            {{ __("You're logged in!") }}
        </x-card>
    </div>

</x-app-layout>
