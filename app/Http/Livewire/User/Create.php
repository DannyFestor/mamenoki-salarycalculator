<?php

namespace App\Http\Livewire\User;

use App\Models\School;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Create extends Base
{
    public function mount(School $school)
    {
        $this->school_uuid = $school->uuid;
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        $password = \Str::password(8, symbols: false);

        \DB::beginTransaction();

        try {
            $school = School::query()
                ->where('uuid', '=', $this->school_uuid)
                ->first();
            if (! $school) {
                throw new \Exception('No school found: '.$this->school_uuid);
            }

            $user = User::create([
                ...$validated->only(['email']),
                'school_id' => $school->id,
                'password' => bcrypt($password),
            ]);

            $userData = UserData::create([
                'user_id' => $user->id,
                ...$validated->except(['email']),
            ]);
            \DB::commit();

            return redirect()->route('schools.users.index', ['school' => $this->school_uuid])->with(
                'success',
                'ユーザを作成しました。'
            );
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            \DB::rollBack();
        }

        return null;
    }

    protected function rules(): array
    {
        return
            (new \App\Http\Requests\User\CreateRequest())->rules() +
            (new \App\Http\Requests\UserData\CreateRequest())->rules();
    }
}
