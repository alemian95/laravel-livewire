<x-app-layout>

    <x-slot name="header">
        {{ __('Items') }}
    </x-slot>

    <div class="py-12">
        <x-card class="max-w-7xl mx-auto">
            <livewire:items-table/>
        </x-card>
    </div>

</x-app-layout>
