<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-xl mx-auto flex flex-col gap-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <x-card>
                    @include('profile.partials.update-profile-information-form')
                </x-card>

                <x-card>
                    @include('profile.partials.update-password-form')
                </x-card>
            </div>

            <x-card>
                @include('profile.partials.delete-user-form')
            </x-card>
        </div>
    </div>
</x-app-layout>
