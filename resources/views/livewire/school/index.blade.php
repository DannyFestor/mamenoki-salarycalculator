<div class="p-4">
    <form @wire:submit.prevent>
        <input type="text" wire:model.debounce.500ms="search" placeholder="学校名">
    </form>

    <div class="flex flex-col gap-2 pt-8">

        @foreach($schools as $school)
            <div class="flex">
                <div class="flex items-center flex-1">
                    <a class="rounded-l h-full pl-2 pr-2 py-2 border-t border-l border-b border-sky-800 text-sky-800 flex justify-between items-center flex-1"
                       href="{{ route('schools.users.index', ['school' => $school]) }}">
                        <div>{{ $school->name }}</div>
                        <div class="text-sm bg-sky-800 text-sky-100 rounded px-2 py-1 font-bold">表示</div>
                    </a>
                </div>
                <div
                    class="rounded-r h-full pr-2 py-2 border-t border-r border-b border-sky-800 text-sky-800 flex justify-between items-center">
                    <a class="text-sm bg-teal-800 text-teal-100 rounded font-bold px-2 py-1"
                       href="{{ route('schools.edit', ['school' => $school]) }}">
                        情報の編集
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
