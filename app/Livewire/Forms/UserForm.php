<?php

namespace App\Livewire\Forms;

use App\Enums\SalaryType;
use App\Enums\StaffType;
use App\Enums\WorkSystem;
use App\Models\School;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Rule;
use Livewire\Form;
use mysql_xdevapi\Warning;

class UserForm extends Form
{
    #[Rule(['required', 'email', 'max:255'])]
    public string $email;

    #[Rule(['required', 'string'])]
    public string $last_name;

    #[Rule(['required', 'string'])]
    public string $first_name;

    #[Rule(['required', 'date'])]
    public string $birthday;

    #[Rule(['required', 'date'])]
    public string $start_date;

    #[Rule(['required', 'date'])]
    public string $end_date;

    #[Rule(['required', 'string'])]
    public string $employee_number;

    #[Rule(['required', new Enum(SalaryType::class)])]
    public int $salary_type = SalaryType::Monthly->value;

    #[Rule(['required', new Enum(StaffType::class)])]
    public int $staff_type = StaffType::FullTime->value;

    #[Rule(['required', new Enum(WorkSystem::class)])]
    public int $work_system = WorkSystem::Rotation->value;

    #[Rule(['required', 'numeric'])]
    public float $daily_hours;

    #[Rule(['required', 'bool'])]
    public bool $has_parking_spot = false;

    #[Rule(['required', 'bool'])]
    public bool $has_meal = false;

    #[Rule(['required', 'bool'])]
    public bool $has_break = false;

    #[Rule(['required', 'bool'])]
    public bool $has_health_insurance = false;

    #[Rule(['required', 'bool'])]
    public bool $has_welfare_pension = false;

    #[Rule(['required', 'bool'])]
    public bool $has_nursing_insurance = false;

    #[Rule(['required', 'bool'])]
    public bool $has_unemployment_insurance = false;

    #[Rule(['required', 'numeric'])]
    public int $monthly_employee_base_salary;

    #[Rule(['required', 'numeric'])]
    public int $monthly_employee_base_salary_hourly;

    #[Rule(['required', 'numeric'])]
    public int $hourly_employee_base_salary;

    #[Rule(['required', 'numeric'])]
    public int $treatment_improvement_1;

    #[Rule(['required', 'numeric'])]
    public int $treatment_improvement_2;

    #[Rule(['required', 'numeric'])]
    public int $position_allowance;

    #[Rule(['required', 'numeric'])]
    public int $job_title_allowance;

    #[Rule(['required', 'numeric'])]
    public int $qualification_allowance;

    #[Rule(['required', 'numeric'])]
    public int $housing_allowance;

    #[Rule(['required', 'numeric'])]
    public int $dependent_care_allowance;

    #[Rule(['required', 'numeric'])]
    public int $commuting_allowance_monthly;

    #[Rule(['required', 'numeric'])]
    public int $commuting_allowance_workdays;

    #[Rule(['required', 'numeric'])]
    public int $municipal_inhabitant_tax;

    #[Rule(['required', 'numeric'])]
    public int $refund_of_withholding_tax;

    #[Rule(['required', 'numeric'])]
    public int $income_tax;

    public function store(string $schoolUuid): bool
    {
        $validated = collect($this->validate());

        $password = \Str::password(8, symbols: false);

        \DB::beginTransaction();

        try {
            $school = School::query()
                ->where('uuid', '=', $schoolUuid)
                ->first();

            if (!$school) {
                throw new \Exception('No school found: ' . $schoolUuid);
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

            return true;
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            \DB::rollBack();

            return false;
        }
    }

    public function update(int $userId): bool
    {
        $validated = collect($this->validate());

        \DB::beginTransaction();

        try {
            $user = User::find($userId);

            $user->update([
                ...$validated->only(['email']),
            ]);

            $user->userData()->update([
                ...$validated->except(['email']),
            ]);

            \DB::commit();

            return true;
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            \DB::rollBack();

            return false;
        }
    }

    public function setUser(User $user): void
    {
        $this->email = $user->email;
        $this->last_name = $user->userData->last_name;
        $this->first_name = $user->userData->first_name;
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
}
