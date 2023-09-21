<div x-data="toggle"
     x-modelable="data"
     wire:model="{{ $attributes->get('wire:model') }}"
     class="flex flex-col">
    <label for="{{$attributes->get('wire:model')}}"
           @click="$refs.toggle.click(); $refs.toggle.focus();"
           class="flex justify-between">
        <span>{{ $slot }}</span>

        @if($attributes->has('required'))
            <span class="text-red-500 ml-4">必須</span>
        @endif
    </label>

    <input type="hidden"
           id="{{ $attributes->get('wire:model') }}"
           name="{{ $attributes->get('wire:model') }}"
           x-value="data">

    <button x-ref="toggle"
            @click="data = !data"
            type="button"
            role="switch"
            :aria-checked="data"
            aria-labelledby="{{ $attributes->get('wire:model') }}"
            class="border border-black w-[75px] h-[42px] p-1 rounded-full relative mt-2 transition-all"
            :class="data ? 'bg-black' : 'bg-white'">
        <div class="rounded-full top-1 h-[32px] w-[32px] transition-all duration-200 absolute"
             :class="data ? 'translate-x-8 bg-white' : 'translate-x-0.5 bg-black' "></div>
    </button>

    @error($attributes->get('wire:model'))
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
