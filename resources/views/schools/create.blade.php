<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択',
        route('schools.create') => '≪ 新規作成',
    ]" />

    <livewire:school.create/>
</x-app-layout>
