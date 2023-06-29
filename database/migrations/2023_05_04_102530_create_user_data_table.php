<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('last_name'); // "dada",
            $table->string('first_name'); // "baba",
            $table->string('name')->virtualAs('CONCAT(last_name, " ", first_name)');
            $table->boolean('is_school_club')->default(false); // 学童クラブフラグ
            $table->date('birthday'); // "1980-01-01",
            $table->date('start_date'); // "2015-01-01",
            $table->date('end_date')->nullable(); // "2015-01-01",
            $table->string('employee_number'); // "asdf",
            $table->unsignedTinyInteger('salary_type')->default(0); // true,
            $table->unsignedTinyInteger('staff_type')->default(0); // 1,
            $table->unsignedTinyInteger('work_system')->default(0); // true,
            $table->unsignedFloat('daily_hours')->default(7.75); // 7.75,
            $table->boolean('has_parking_spot')->default(false); // true,
            $table->boolean('has_meal')->default(false); // true,
            $table->boolean('has_break')->default(false); // true,
            $table->boolean('has_health_insurance')->default(false); // true,
            $table->boolean('has_welfare_pension')->default(false); // true,
            $table->boolean('has_nursing_insurance')->default(false); // true,
            $table->boolean('has_unemployment_insurance')->default(false); // true,
            $table->unsignedInteger('monthly_employee_base_salary'); // 100000,
            $table->unsignedInteger('monthly_employee_base_salary_hourly'); // 100000,
            $table->unsignedInteger('hourly_employee_base_salary'); // 100000,
            $table->unsignedInteger('treatment_improvement_1'); // 100000,
            $table->unsignedInteger('treatment_improvement_2'); // 100000,
            $table->unsignedInteger('position_allowance'); // 100000,
            $table->unsignedInteger('job_title_allowance'); // 100000,
            $table->unsignedInteger('qualification_allowance'); // 100000,
            $table->unsignedInteger('housing_allowance'); // 100000,
            $table->unsignedInteger('dependent_care_allowance'); // 100000,
            $table->unsignedInteger('commuting_allowance_monthly'); // 100000,
            $table->unsignedInteger('commuting_allowance_workdays'); // 100000,
            $table->unsignedInteger('municipal_inhabitant_tax'); // 100000,
            $table->unsignedInteger('refund_of_withholding_tax'); // 100000,
            $table->unsignedInteger('income_tax'); // 100000
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
