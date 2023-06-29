@props(['options'])

<div x-data="select"
     x-modelable="data"
     x-model="{{ $attributes->get('x-model') }}"
     class="flex flex-col">
    <label for="{{$attributes->get('x-model')}}"
           class="flex justify-between">
        <span>{{ $slot }}</span>

        @if($attributes->has('required'))
            <span class="text-red-500 ml-4">必須</span>
        @endif
    </label>

    <select x-model="data"
            class="form-select rounded mt-2">
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>

    @error($attributes->get('x-model'))
    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>

@pushonce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('select', () => ({
                data: 0,
            }));
        });
    </script>
@endpushonce
