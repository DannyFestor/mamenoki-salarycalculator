<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択',
        route('schools.users.index', ['school' => $school]) => '≪ ユーザ選択',
        route('schools.users.create', ['school' => $school]) => '≪ 新規作成',
    ]" />

    <livewire:user.create :school="$school" />
</x-app-layout>
