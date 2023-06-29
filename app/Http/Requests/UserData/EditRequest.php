<?php

namespace App\Http\Requests\UserData;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'last_name' => ['required'],
            'first_name' => ['required'],
            'is_school_club' => ['required'],
            'birthday' => ['required', 'date'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date'],
            'employee_number' => ['required'],
            'salary_type' => ['required', 'integer'],
            'staff_type' => ['required', 'integer'],
            'work_system' => ['required', 'integer'],
            'daily_hours' => ['required', 'numeric'],
            'has_parking_spot' => ['required'],
            'has_meal' => ['required'],
            'has_break' => ['required'],
            'has_health_insurance' => ['required'],
            'has_welfare_pension' => ['required'],
            'has_nursing_insurance' => ['required'],
            'has_unemployment_insurance' => ['required'],
            'monthly_employee_base_salary' => ['required', 'integer'],
            'monthly_employee_base_salary_hourly' => ['required', 'integer'],
            'hourly_employee_base_salary' => ['required', 'integer'],
            'treatment_improvement_1' => ['required', 'integer'],
            'treatment_improvement_2' => ['required', 'integer'],
            'position_allowance' => ['required', 'integer'],
            'job_title_allowance' => ['required', 'integer'],
            'qualification_allowance' => ['required', 'integer'],
            'housing_allowance' => ['required', 'integer'],
            'dependent_care_allowance' => ['required', 'integer'],
            'commuting_allowance_monthly' => ['required', 'integer'],
            'commuting_allowance_workdays' => ['required', 'integer'],
            'municipal_inhabitant_tax' => ['required', 'integer'],
            'refund_of_withholding_tax' => ['required', 'integer'],
            'income_tax' => ['required', 'integer'],
        ];
    }
}
