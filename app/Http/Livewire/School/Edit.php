<?php

namespace App\Http\Livewire\School;

use App\Http\Requests\School\EditRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Edit extends Base
{

    public int $school_uuid;

    public function mount(School $school): void
    {
        $this->school_uuid = $school->uuid;
        $this->name = $school->name;
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        try {
            $school = School::query()
                ->where('uuid', '=', $this->school_uuid)
                ->first();
            if (!$school) {
                throw new \Exception('No school found' . $this->school_uuid);
            }

            $school->update($validated->toArray());

            return redirect()->route('schools.index')->with('success', '施設を作成しました。');
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
