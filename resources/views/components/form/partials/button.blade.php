@props(['type' => 'submit'])
<button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'rounded px-4 py-2 bg-indigo-800 text-indigo-100 font-bold' ]) }}>
    {{ $slot }}
</button>
