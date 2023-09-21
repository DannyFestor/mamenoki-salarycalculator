<div class="p-4">

    <div class="flex justify-between items-center w-full">
        <form @wire:submit>
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="名前"
                   class="form-input rounded border-sky-800">
        </form>

        <a class="px-3 py-2 text-white bg-sky-800 text-sm rounded" href="{{ route('schools.users.create', ['school' => $schoolUuid]) }}">新規登録</a>
    </div>

    <div class="flex flex-col gap-2 pt-8">
        @foreach($users as $user)
            <div class="flex flex-col sm:flex-row">
                <div class="flex items-center flex-1">
                    <a class="rounded-t sm:rounded-l sm:rounded-r-none h-full pl-2 pr-2 py-2 border-t border-l border-r sm:border-r-0 sm:border-b border-sky-800 text-sky-800 flex items-center flex-1"
                       href="{{ route('schools.users.work-situation', ['school' => $schoolUuid, 'user' => $user->uuid]) }}">
                        <div>{{ $user->name }} ({{ $user->email }})</div>
                    </a>
                </div>
                <div
                    class="rounded-b sm:rounded-l-none sm:rounded-r h-full p-2 sm:border-t border-r border-l sm:border-l-0 border-b border-sky-800 text-sky-800 flex justify-between gap-2 items-center">
                    <a class="text-sm bg-sky-800 text-sky-100 rounded px-2 py-1 font-bold"
                       href="{{ route('schools.users.work-situation', ['school' => $schoolUuid, 'user' => $user->uuid]) }}"
                    >表示</a>
                    <a class="text-sm bg-teal-800 text-teal-100 rounded font-bold px-2 py-1"
                       href="{{ route('schools.users.edit', ['school' => $schoolUuid, 'user' => $user->uuid]) }}">
                        登録情報の編集
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
