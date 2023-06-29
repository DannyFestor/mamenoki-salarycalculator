<x-app-layout>
    <div class="p-4">
        <a href="{{ route('schools.users.index', ['school' => $school]) }}">≪ ユーザ選択に戻る</a>
    </div>

    <livewire:user.edit :school="$school" :user="$user" />
</x-app-layout>
