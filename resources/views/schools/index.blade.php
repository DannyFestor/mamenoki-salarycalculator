<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択'
    ]" />

    <section class="flex justify-end gap-4 py-4 px-4">
        <a href="{{ route('schools.create') }}"
           class="px-4 py-2 rounded bg-sky-800 text-sky-100">新規作成</a>
    </section>

    <livewire:school.index />
</x-app-layout>
