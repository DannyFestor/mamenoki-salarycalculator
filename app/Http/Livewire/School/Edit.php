<?php

namespace App\Http\Livewire\School;

use App\Http\Requests\School\EditRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Edit extends Base
{

    public int $school_id;

    public function mount(School $school): void
    {
        $this->school_id = $school->id;
        $this->name = $school->name;
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        try {
            $school = School::find($this->school_id);

            $school->update($validated->toArray());

            return redirect()->route('schools.edit', ['school' => $school])->with('success', '施設を作成しました。');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
        }

        return null;
    }

    protected function rules(): array
    {
        return (new EditRequest())->rules();
    }
}
