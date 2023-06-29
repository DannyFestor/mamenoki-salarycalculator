<x-app-layout>
    <section class="flex justify-end gap-4 py-4 px-4">
        <a href="{{ route('schools.create') }}"
           class="px-4 py-2 rounded bg-indigo-800 text-indigo-100">新規作成</a>
    </section>

    <livewire:school.index />
</x-app-layout>
