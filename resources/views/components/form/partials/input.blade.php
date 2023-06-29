@props(['type' => 'text'])

<div x-data="input"
     x-modelable="data"
     x-model="{{ $attributes->get('x-model') }}"
     class="flex flex-col">
    <label for="{{$attributes->get('x-model')}}" class="flex justify-between">
        {{ $slot }}

        @if($attributes->has('required'))
           <span class="text-red-500 ml-4">必須</span>
        @endif
    </label>

    <input type="{{ $type }}"
           id="{{ $attributes->get('x-model') }}"
           name="{{ $attributes->get('x-model') }}"
           x-model="data"
           @if($attributes->has('required'))
               required
           aria-required="true"
           @endif
           @if($attributes->has('min'))
               min="{{ $attributes->get('min') }}"
           aria-min="{{ $attributes->get('min') }}"
           @endif
           @if($attributes->has('max'))
               max="{{ $attributes->get('max') }}"
           aria-max="{{ $attributes->get('max') }}"
           @endif
           @if($attributes->has('step'))
               step="{{ $attributes->get('step') }}"
           aria-step="{{ $attributes->get('step') }}"
           @endif
           aria-labelledby="{{ $attributes->get('x-model') }}"
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
        });
    </script>
@endpushonce
