<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Create extends Base
{
    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        $password = \Str::password(8, symbols: false);

        \DB::beginTransaction();

        try {
            $user = User::create([
                ...$validated->only(['email']),
                'password' => bcrypt($password),
            ]);

            $userData = UserData::create([
                'user_id' => $user->id,
                ...$validated->except(['email']),
            ]);
            \DB::commit();

            return redirect()->route('user.edit', ['user' => $user])->with('success', 'ユーザを作成しました。');
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
