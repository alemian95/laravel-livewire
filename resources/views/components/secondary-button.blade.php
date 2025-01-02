<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-sm text-slate-900 border border-slate-600 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-slate-600 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
