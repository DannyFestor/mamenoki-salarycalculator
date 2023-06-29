<?php

namespace App\Http\Livewire\School;

use App\Models\School;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';

    protected $queryString = ['search' => ['as' => 's', 'except' => '']];

    public function render()
    {
        $schools = School::query()
            ->when($this->search, fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))
            ->get();

        return view('livewire.school.index', [
            'schools' => $schools,
        ]);
    }
}
