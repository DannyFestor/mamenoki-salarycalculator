@props(['type' => 'text'])

<div x-data="input"
     x-modelable="data"
     x-model="{{ $attributes->get('x-model') }}"
     class="flex flex-col">
    <label for="{{$attributes->get('x-model')}}">{{ $slot }}</label>
    <input type="{{ $type }}"
           id="{{ $attributes->get('x-model') }}"
           name="{{ $attributes->get('x-model') }}"
           x-model="data"
           class="form-input rounded mt-2">

    @error($attributes->get('x-model'))
    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>

@pushonce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('input', () => ({
                data: null,
            }));
        })
    </script>
@endpushonce
