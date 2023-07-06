<?php

namespace Database\Factories;

use App\Enums\SalaryType;
use App\Enums\StaffType;
use App\Enums\WorkSystem;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserDataFactory extends Factory
{
    protected $model = UserData::class;

    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'birthday' => $this->faker->dateTimeBetween('-80 years', '-20 years'),
            'start_date' => $this->faker->dateTimeBetween('-10 years', '-1 month'),
            'end_date' => $this->faker->dateTimeBetween('-10 years', '-1 month'),
            'employee_number' => \Str::random(),
            'salary_type' => $this->faker->randomElement(SalaryType::cases()),
            'staff_type' => $this->faker->randomElement(StaffType::cases()),
            'work_system' => $this->faker->randomElement(WorkSystem::cases()),
            'daily_hours' => $this->faker->randomFloat(2, 2.0, 8.0),
            'has_parking_spot' => $this->faker->boolean(),
            'has_meal' => $this->faker->boolean(),
            'has_break' => $this->faker->boolean(),
            'has_health_insurance' => $this->faker->boolean(),
            'has_welfare_pension' => $this->faker->boolean(),
            'has_nursing_insurance' => $this->faker->boolean(),
            'has_unemployment_insurance' => $this->faker->boolean(),
            'monthly_employee_base_salary' => random_int(50_000, 300_000),
            'monthly_employee_base_salary_hourly' => random_int(800, 4000),
            'hourly_employee_base_salary' => random_int(800, 4000),
            'treatment_improvement_1' => random_int(1000, 20000),
            'treatment_improvement_2' => random_int(1000, 20000),
            'position_allowance' => random_int(1000, 20000),
            'job_title_allowance' => random_int(1000, 20000),
            'qualification_allowance' => random_int(1000, 20000),
            'housing_allowance' => random_int(1000, 20000),
            'dependent_care_allowance' => random_int(1000, 20000),
            'commuting_allowance_monthly' => random_int(1000, 20000),
            'commuting_allowance_workdays' => random_int(1000, 20000),
            'municipal_inhabitant_tax' => random_int(1000, 20000),
            'refund_of_withholding_tax' => random_int(1000, 20000),
            'income_tax' => random_int(1000, 20000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
