<x-app-layout>
    <x-layouts.breadcrumps :routes="[
        route('schools.index') => '≪ 施設選択',
        route('schools.edit', ['school' => $school]) => '≪ ' . $school->name . 'の編集',
    ]" />

    <livewire:school.edit :school="$school" />
</x-app-layout>
