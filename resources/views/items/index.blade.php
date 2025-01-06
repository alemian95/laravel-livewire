<x-app-layout>

    <x-slot name="header">
        {{ __('Items') }}
    </x-slot>

    <div class="py-8">
        <x-card class="max-w-screen-2xl mx-auto">
            <div class="flex items-center justify-end">
                <a href="{{ route('items.create') }}">
                    <x-primary-button class="text-xs">
                        {{ __('Create Item') }}
                    </x-primary-button>
                </a>
            </div>

            <div class="mt-4">
                <livewire:items-table />
            </div>
        </x-card>
    </div>

</x-app-layout>
