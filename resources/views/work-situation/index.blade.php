<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択',
        route('schools.users.index', ['school' => $school]) => '≪ ユーザ選択',
        route('schools.users.work-situation', ['school' => $school, 'user' => $user]) => '≪ 勤務状況 入力',
    ]" />

    <livewire:work-situation.index :user="$user"/>
</x-app-layout>
