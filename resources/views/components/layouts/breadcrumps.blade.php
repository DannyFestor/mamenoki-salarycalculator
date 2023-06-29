@props(['routes' => []])
<div class="flex items-center p-4 gap-4">
    @foreach($routes as $route => $label)
    <a href="{{ $route }}" class="underline text-sky-600">{{ $label }}</a>
    @endforeach
</div>
