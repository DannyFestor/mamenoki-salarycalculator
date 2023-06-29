<nav x-data="{ open: false }"
     class="fixed bg-white top-0 left-0 right-0 shadow p-4 z-10 flex items-center justify-between">
    <a href="/" class="text-xl font-bold">給与計算ソフト</a>

    <div class="flex justify-end items-center gap-2">
        <a href="{{ route('schools.index') }}"
           class="px-4 py-2 rounded bg-sky-800 text-sky-100"
        >
            学校選択
        </a>
    </div>
</nav>
