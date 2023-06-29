<x-app-layout>
    <div class="p-4">
        <a href="{{ route('schools.users.index', ['school' => $school]) }}">≪ ユーザ選択に戻る</a>
    </div>

    <livewire:user.create :school="$school" />
</x-app-layout>
