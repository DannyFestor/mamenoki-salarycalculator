<?php

namespace App\Livewire\School;

use App\Models\School;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(as: 's')]
    public string $search = '';

    public function render()
    {
        $schools = School::query()
            ->when($this->search, fn (Builder $query) => $query->where('name', 'like', '%'.$this->search.'%'))
            ->get();

        return view('livewire.school.index', [
            'schools' => $schools,
        ]);
    }
}
