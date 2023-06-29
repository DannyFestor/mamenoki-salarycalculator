<div class="p-4">
    <form @wire:submit.prevent>
        <input type="text" wire:model.debounce.500ms="search" placeholder="名前">
    </form>

    <div class="flex flex-col gap-2 pt-8">

        @foreach($users as $user)
            <div class="rounded flex gap-2 items-center px-4 py-2 border border-indigo-800 text-indigo-800">
                <a class="flex justify-between items-center flex-1"
                   href="{{ route('schools.users.edit', ['school' => $school_uuid, 'user' => $user->uuid]) }}">
                    <div>{{ $user->name }} ({{ $user->email }})</div>
                    <div class="text-sm bg-indigo-800 text-indigo-100 rounded px-2 py-1 font-bold">表示</div>
                    (TODO -> work info)
                </a>

                <a class="text-sm bg-emerald-800 text-emerald-100 rounded px-2 py-1 font-bold"
                   href="{{ route('schools.users.edit', ['school' => $school_uuid, 'user' => $user->uuid]) }}">
                >編集</a>
            </div>
        @endforeach
    </div>
</div>
