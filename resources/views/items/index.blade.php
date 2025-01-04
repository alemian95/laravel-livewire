<x-app-layout>

    <x-slot name="header">
        {{ __('Items') }}
    </x-slot>

    <div class="py-8">
        <x-card class="max-w-screen-xl mx-auto">
            <livewire:items-table/>
        </x-card>
    </div>

</x-app-layout>
