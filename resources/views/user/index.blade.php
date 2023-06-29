<x-app-layout>
    <section class="flex justify-end gap-4 py-4 px-4">
        <a href="{{ route('schools.users.create', ['school' => $school]) }}"
           class="px-4 py-2 rounded bg-indigo-800 text-indigo-100">新規作成</a>
    </section>

    <livewire:user.index :school="$school"/>
</x-app-layout>