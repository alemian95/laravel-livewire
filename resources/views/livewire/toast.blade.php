<div>
    <div class="fixed top-4 right-4 space-y-2 z-50">
        @foreach($toasts as $toast)
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, {{ $toast['duration'] }});"
                :class="{
                    'bg-white border-none text-slate-900': '{{ $toast['type'] }}' == 'default',
                    'bg-green-200 border-green-600 text-green-800': '{{ $toast['type'] }}' == 'success',
                    'bg-red-200 border-red-600 text-red-800': '{{ $toast['type'] }}' == 'error'
                }"
                class="px-4 py-2 rounded shadow-lg">
                <strong>{{ $toast['title'] }}</strong>
                <p>{{ $toast['message'] }}</p>
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
