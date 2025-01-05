<x-app-layout>

    <livewire:toast />

    <x-slot name="header">
        {{ __('Items') }}
    </x-slot>

    <div class="py-8">

        <div class="max-w-screen-xl mx-auto">
            <a href="{{ route('items.index') }}">&laquo; Back to list</a>
        </div>

        <x-card class="max-w-screen-2xl mx-auto mt-8">
            <form method="post" action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}">

                @csrf
                @if (isset($item))
                    @method('patch')
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block" :value="old('name', $item->name ?? null)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="code" :value="__('Code')" />
                        <x-text-input id="code" name="code" type="text" class="mt-1 block" :value="old('code', $item->code ?? null)" required autofocus autocomplete="code" />
                        <x-input-error class="mt-2" :messages="$errors->get('code')" />
                    </div>
                    <div>
                        <x-input-label for="value" :value="__('Value')" />
                        <x-text-input id="value" name="value" type="number" class="mt-1 block" :value="old('value', $item->value ?? null)" required autofocus autocomplete="value" />
                        <x-input-error class="mt-2" :messages="$errors->get('value')" />
                    </div>
                    <div>
                        <x-input-label for="is_active" :value="__('Is active')" />
                        <select name="is_active" id="is_active" class="mt-1 block w-full border-slate-300 focus:border-sky-600 focus:ring-sky-600 rounded-md">
                            <option value="1" @if ($item->is_active ?? null == 1) selected @endif>Active</option>
                            <option value="0" @if ($item->is_active ?? null == 0) selected @endif>Inactive</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('is_active')" />
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <x-primary-button>Save</x-primary-button>
                </div>
            </form>
        </x-card>
    </div>

</x-app-layout>
