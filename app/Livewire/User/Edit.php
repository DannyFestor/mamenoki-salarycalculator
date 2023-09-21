<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Edit extends Component
{
    public UserForm $form;

    public string $schoolUuid;

    public int $userId;

    public int $userDataId;

    public function mount(School $school, User $user): void
    {
        $this->schoolUuid = $school->uuid;
        $this->userId = $user->id;
        $this->userDataId = $user->userData->id;

        $this->form->setUser($user);
    }

    public function render()
    {
        return view('livewire.user.view');
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $success = $this->form->update($this->userId);

        if (!$success) {
            abort(500);
        }

        return redirect()
            ->route('schools.users.index', ['school' => $this->schoolUuid])
            ->with('success', 'ユーザ情報を更新しました。');
    }
}
