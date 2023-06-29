<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class Edit extends Base
{
    public int $user_id;

    public int $user_data_id;

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->user_data_id = $user->userData->id;

        $this->email = $user->email;
        $this->last_name = $user->userData->last_name;
        $this->first_name = $user->userData->first_name;
        $this->is_school_club = $user->userData->is_school_club;
        $this->birthday = $user->userData->birthday;
        $this->start_date = $user->userData->start_date;
        $this->end_date = $user->userData->end_date;
        $this->employee_number = $user->userData->employee_number;
        $this->salary_type = $user->userData->salary_type;
        $this->staff_type = $user->userData->staff_type;
        $this->work_system = $user->userData->work_system;
        $this->daily_hours = $user->userData->daily_hours;
        $this->has_parking_spot = $user->userData->has_parking_spot;
        $this->has_meal = $user->userData->has_meal;
        $this->has_break = $user->userData->has_break;
        $this->has_health_insurance = $user->userData->has_health_insurance;
        $this->has_welfare_pension = $user->userData->has_welfare_pension;
        $this->has_nursing_insurance = $user->userData->has_nursing_insurance;
        $this->has_unemployment_insurance = $user->userData->has_unemployment_insurance;
        $this->monthly_employee_base_salary = $user->userData->monthly_employee_base_salary;
        $this->monthly_employee_base_salary_hourly = $user->userData->monthly_employee_base_salary_hourly;
        $this->hourly_employee_base_salary = $user->userData->hourly_employee_base_salary;
        $this->treatment_improvement_1 = $user->userData->treatment_improvement_1;
        $this->treatment_improvement_2 = $user->userData->treatment_improvement_2;
        $this->position_allowance = $user->userData->position_allowance;
        $this->job_title_allowance = $user->userData->job_title_allowance;
        $this->qualification_allowance = $user->userData->qualification_allowance;
        $this->housing_allowance = $user->userData->housing_allowance;
        $this->dependent_care_allowance = $user->userData->dependent_care_allowance;
        $this->commuting_allowance_monthly = $user->userData->commuting_allowance_monthly;
        $this->commuting_allowance_workdays = $user->userData->commuting_allowance_workdays;
        $this->municipal_inhabitant_tax = $user->userData->municipal_inhabitant_tax;
        $this->refund_of_withholding_tax = $user->userData->refund_of_withholding_tax;
        $this->income_tax = $user->userData->income_tax;
    }

    public function onSubmit(): Redirector|RedirectResponse|null
    {
        $validated = collect($this->validate());

        \DB::beginTransaction();

        try {
            $user = User::find($this->user_id);

            $user->update([
                ...$validated->only(['email']),
            ]);

            $user->userData()->update([
                ...$validated->except(['email']),
            ]);

            \DB::commit();

            return redirect()->route('user.edit', ['user' => $user])->with('success', 'ユーザ情報を更新しました。');
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
            (new \App\Http\Requests\User\EditRequest())->rules() +
            (new \App\Http\Requests\UserData\EditRequest())->rules();
    }
}
