<div>
    <div class="fixed top-4 right-4 space-y-2 z-50">
        @foreach($toasts as $toast)
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, {{ $toast['duration'] }});"
                :class="{
                    'bg-white border-2 border-slate-800 text-slate-900': '{{ $toast['type'] }}' == 'default',
                    'bg-green-200 border-2 border-green-600 text-green-800': '{{ $toast['type'] }}' == 'success',
                    'bg-red-200 border-2 border-red-600 text-red-800': '{{ $toast['type'] }}' == 'error'
                }"
                class="px-2 py-2 rounded shadow"
            >
                <div class="min-w-24">
                    <div class="flex justify-between items-center gap-4">
                        <strong class="text-sm">{{ $toast['title'] }}</strong>
                        <i wire:click="$dispatch('remove-toast', { id: '{{ $toast['id'] }}' })" class="fa-solid fa-xmark cursor-pointer"></i>
                    </div>
                    <p class="text-xs">{{ $toast['message'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toast(type, title, message, duration = 3000) {
            // window.Livewire.emit('showToast', type, title, message, duration);
            Livewire.dispatch('showToast', { type, title, message, duration });
        }
    </script>
</div>
