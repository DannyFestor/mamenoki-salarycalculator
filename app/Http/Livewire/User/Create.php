<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Create extends Component
{
    public string $email;
    public string $last_name;
    public string $first_name;
    public bool $is_school_club;
    public string $birthday;
    public string $start_date;
    public string $end_date;
    public string $employee_number;
    public int $salary_type;
    public int $staff_type;
    public int $work_system;
    public float $daily_hours;
    public bool $has_parking_spot;
    public bool $has_meal;
    public bool $has_break;
    public bool $has_health_insurance;
    public bool $has_welfare_pension;
    public bool $has_nursing_insurance;
    public bool $has_unemployment_insurance;
    public int $monthly_employee_base_salary;
    public int $monthly_employee_base_salary_hourly;
    public int $hourly_employee_base_salary;
    public int $treatment_improvement_1;
    public int $treatment_improvement_2;
    public int $position_allowance;
    public int $job_title_allowance;
    public int $qualification_allowance;
    public int $housing_allowance;
    public int $dependent_care_allowance;
    public int $commuting_allowance_monthly;
    public int $commuting_allowance_workdays;
    public int $municipal_inhabitant_tax;
    public int $refund_of_withholding_tax;
    public int $income_tax;

    public function render()
    {
        return view('livewire.user.create');
    }
}
