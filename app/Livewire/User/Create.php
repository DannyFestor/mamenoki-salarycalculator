<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Create extends Component
{
    public UserForm $form;

    #[Locked]
    public string $schoolId;

    public function mount(School $school): void
    {
        $this->schoolId = $school->uuid;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.user.view');
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $success = $this->form->store($this->schoolId);

        if (!$success) {
            abort(500);
        }

        return redirect()
            ->route('schools.users.index', ['school' => $this->schoolId])
            ->with('success', 'ユーザを作成しました。');
    }
}
