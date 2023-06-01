<div x-data="toggle"
     x-modelable="data"
     x-model="{{ $attributes->get('x-model') }}"
     class="flex flex-col">
    <label for="{{$attributes->get('x-model')}}"
           @click="$refs.toggle.click(); $refs.toggle.focus();">
        <span>{{ $slot }}</span>
    </label>

    <input type="hidden"
           id="{{ $attributes->get('x-model') }}"
           name="{{ $attributes->get('x-model') }}"
           x-value="data">

    <button x-ref="toggle"
            @click="data = !data"
            type="button"
            role="switch"
            :aria-checked="value"
            aria-labelledby="{{ $attributes->get('x-model') }}"
            class="border border-black w-[75px] h-[42px] p-1 rounded-full relative mt-2 transition-all"
            :class="data ? 'bg-black' : 'bg-white'">
        <div class="rounded-full top-1 h-[32px] w-[32px] transition-all duration-200 absolute"
             :class="data ? 'translate-x-8 bg-white' : 'translate-x-0.5 bg-black' "></div>
    </button>

    @error($attributes->get('x-model'))
    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>

@pushonce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('toggle', () => ({
                data: false,
            }));
        });
    </script>
@endpushonce
