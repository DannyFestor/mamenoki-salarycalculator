<?php

namespace App\Http\Livewire\School;

use App\Http\Requests\School\CreateRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Create extends Base
{

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        try {
            $school = School::create($validated->toArray());

            return redirect()->route('schools.index')->with('success', '施設を作成しました。');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
        }

        return null;
    }

    protected function rules(): array
    {
        return (new CreateRequest())->rules();
    }
}
