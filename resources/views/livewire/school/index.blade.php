<div class="p-4">
    <form @wire:submit.prevent>
        <input type="text" wire:model.debounce.500ms="search" placeholder="学校名">
    </form>

    <div class="flex flex-col gap-2 pt-8">

    @foreach($schools as $school)
        <div class="rounded flex gap-2 items-center px-4 py-2 border border-indigo-800 text-indigo-800">
            <a class="flex justify-between items-center flex-1" href="{{ route('schools.users.index', ['school' => $school]) }}">
                <div>{{ $school->name }}</div>
                <div class="text-sm bg-indigo-800 text-indigo-100 rounded px-2 py-1 font-bold">表示</div>
            </a>

            <a class="text-sm bg-emerald-800 text-emerald-100 rounded px-2 py-1 font-bold" href="{{ route('schools.edit', ['school' => $school]) }}">編集</a>
        </div>
    @endforeach
    </div>
</div>
