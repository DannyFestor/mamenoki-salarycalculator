<div class="p-4">
    <form @wire:submit>
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="学校名" class="form-input rounded border-sky-800">
    </form>

    <div class="flex flex-col gap-2 pt-8">

        @foreach($schools as $school)
            <div class="flex flex-col sm:flex-row">
                <div class="flex items-center flex-1">
                    <a class="rounded-t sm:rounded-l sm:rounded-r-none h-full pl-2 pr-2 py-2 border-t border-l border-r sm:border-r-0 sm:border-b border-sky-800 text-sky-800 flex items-center flex-1"
                       href="{{ route('schools.users.index', ['school' => $school]) }}">
                        <div>{{ $school->name }}</div>
                    </a>
                </div>
                <div
                    class="rounded-b sm:rounded-l-none sm:rounded-r h-full p-2 sm:border-t border-r border-l sm:border-l-0 border-b border-sky-800 text-sky-800 flex justify-between gap-2 items-center">
                    <a class="text-sm bg-sky-800 text-sky-100 rounded px-2 py-1 font-bold"
                       href="{{ route('schools.users.index', ['school' => $school]) }}"
                    >表示</a>
                    <a class="text-sm bg-teal-800 text-teal-100 rounded font-bold px-2 py-1"
                       href="{{ route('schools.edit', ['school' => $school]) }}">
                        情報の編集
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
