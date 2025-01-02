@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-slate-300 focus:border-sky-600 focus:ring-sky-600 rounded-md']) }}>
