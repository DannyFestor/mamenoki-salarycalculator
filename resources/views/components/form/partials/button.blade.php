@props(['type' => 'submit'])
<button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'rounded px-4 py-2 bg-sky-800 text-sky-100 font-bold' ]) }}>
    {{ $slot }}
</button>
