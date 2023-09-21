@props(['options', 'enum' => null])

<div class="flex flex-col">
    <label for="{{$attributes->get('wire:model')}}"
           class="flex justify-between">
        <span>{{ $slot }}</span>

        @if($attributes->has('required'))
            <span class="text-red-500 ml-4">必須</span>
        @endif
    </label>

    <select wire:model="{{ $attributes->get('wire:model') }}"
            class="form-select rounded mt-2">
        @foreach($options as $value => $label)
            @if($enum !== null)
                <option value="{{ $value }}">{{ __('enums.' . $enum . '.' . $label) }}</option>
            @else
                <option value="{{ $value }}">{{ $label }}</option>
            @endif
        @endforeach
    </select>

    @error($attributes->get('wire:model'))
    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>
