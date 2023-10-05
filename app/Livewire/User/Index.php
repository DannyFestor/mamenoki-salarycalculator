<?php

namespace App\Livewire\User;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public string $schoolUuid;

    #[Url(as: 's')]
    public string $search = '';

    public function mount(School $school)
    {
        $this->schoolUuid = $school->uuid;
    }

    public function render()
    {
        $users = User::query()
            ->select(['users.id', 'users.uuid', 'users.email', 'user_data.name'])
            ->leftJoin('schools', 'schools.id', '=', 'users.school_id')
            ->leftJoin('user_data', 'user_data.user_id', '=', 'users.id')
            ->where('schools.uuid', '=', $this->schoolUuid)
            ->when(
                $this->search,
                fn(Builder $query) => $query->where(
                    fn(Builder $query) => $query
                        ->where('users.email', 'like', '%' . $this->search . '%')
                        ->orWhere('user_data.last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('user_data.first_name', 'like', '%' . $this->search . '%')
                )
            )
            ->get();

        return view('livewire.user.index', [
            'users' => $users,
        ]);
    }
}
