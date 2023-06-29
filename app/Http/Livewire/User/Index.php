<?php

namespace App\Http\Livewire\User;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    public string $school_uuid;
    public string $search = '';

    protected $queryString = ['search' => ['as' => 's', 'except' => '']];


    public function mount(School $school)
    {
        $this->school_uuid = $school->uuid;
    }

    public function render()
    {
        $users = User::query()
            ->select(['users.id', 'users.uuid', 'users.email', 'user_data.name'])
            ->leftJoin('schools', 'school_id', '=', 'users.school_id')
            ->leftJoin('user_data', 'user_data.user_id', '=', 'users.id')
            ->where('schools.uuid', '=', $this->school_uuid)
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
