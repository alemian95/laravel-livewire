<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
