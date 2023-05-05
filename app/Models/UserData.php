<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserData extends Model
{
    protected $table = 'user_data';

    protected $fillable = [
        'last_name',
        'first_name',
        'is_school_club',
        'birthday',
        'start_date',
        'end_date',
        'employee_number',
        'salary_type',
        'staff_type',
        'work_system',
        'daily_hours',
        'has_parking_spot',
        'has_meal',
        'has_break',
        'has_health_insurance',
        'has_welfare_pension',
        'has_nursing_insurance',
        'has_unemployment_insurance',
        'monthly_employee_base_salary',
        'monthly_employee_base_salary_hourly',
        'hourly_employee_base_salary',
        'treatment_improvement_1',
        'treatment_improvement_2',
        'position_allowance',
        'job_title_allowance',
        'qualification_allowance',
        'housing_allowance',
        'dependent_care_allowance',
        'commuting_allowance_monthly',
        'commuting_allowance_workdays',
        'municipal_inhabitant_tax',
        'refund_of_withholding_tax',
        'income_tax',
    ];

    protected $casts = [
        'is_school_club' => 'boolean',
        'has_parking_spot' => 'boolean',
        'has_meal' => 'boolean',
        'has_break' => 'boolean',
        'has_health_insurance' => 'boolean',
        'has_welfare_pension' => 'boolean',
        'has_nursing_insurance' => 'boolean',
        'has_unemployment_insurance' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
