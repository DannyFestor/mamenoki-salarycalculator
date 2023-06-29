<x-app-layout>
    <div class="p-4">
        <a href="{{ route('schools.index') }}" class="text-indigo-600 underline">≪ 学校選択に戻る</a>
    </div>

    <livewire:school.edit :school="$school" />
</x-app-layout>
