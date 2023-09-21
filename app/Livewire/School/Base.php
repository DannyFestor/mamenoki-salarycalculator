<?php

namespace App\Livewire\School;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

abstract class Base extends Component
{
    public string $name;

    public function render()
    {
        return view('livewire.school.view');
    }

    abstract public function onSubmit(): Redirector|RedirectResponse|null;

    abstract protected function rules(): array;
}
