<?php

namespace Database\Factories;

use App\Models\WorkSituation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WorkSituationFactory extends Factory
{
    protected $model = WorkSituation::class;

    public function definition(): array
    {
        return [
            'days_worked' => random_int(0, 30),
            'vacation_full_days' => random_int(0, 30),
            'vacation_half_days' => random_int(0, 30),
            'vacation_time_off' => random_int(0, 8),
            'special_vacation_full_days' => random_int(0, 30),
            'special_vacation_half_days' => random_int(0, 30),
            'special_vacation_time_off' => random_int(0, 8),
            'absence_days' => random_int(0, 30),
            'absence_hours' => random_int(0, 8),
            'leave_without_pay_days' => random_int(0, 30),
            'leave_without_pay_hours' => random_int(0, 8),
            'additional_hours' => random_int(0, 8),
            'early_shifts_days' => random_int(0, 30),
            'no_lunch_days' => random_int(0, 30),
            'holiday_work_overtime' => random_int(0, 8),
            'holiday_work_compensatory_time_off' => random_int(0, 8),
            'temporary_closing_school_days' => random_int(0, 30),
            'temporary_holiday_closure_hours' => random_int(0, 8),
            'work_at_home_days' => random_int(0, 30),
            'conference_fee' => random_int(0, 3),
            'overtime_over_8_hours' => random_int(0, 8),
            'overtime_under_8_hours' => random_int(0, 8),
            'comment' => $this->faker->realText,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
