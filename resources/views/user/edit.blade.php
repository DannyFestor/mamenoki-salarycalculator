<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択',
        route('schools.users.index', ['school' => $school]) => '≪ ユーザ選択',
        route('schools.users.edit', ['school' => $school, 'user' => $user]) => '≪ ' . $user->userData->name . 'の編集',
    ]" />

    <livewire:user.edit :school="$school" :user="$user" />
</x-app-layout>
