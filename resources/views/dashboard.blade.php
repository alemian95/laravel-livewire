<x-app-layout>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <x-card class="max-w-7xl mx-auto">
            {{ __("You're logged in!") }}
        </x-card>
    </div>

</x-app-layout>
