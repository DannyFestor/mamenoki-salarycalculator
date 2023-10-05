<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('work_situations', function(Blueprint $table) {
            $table->integer('salary_working_days_with_vacation')->nullable();
            $table->integer('salary_working_hours_with_vacation')->nullable();
            $table->integer('salary_overtime_payment_over_8_hours')->nullable();
            $table->integer('salary_overtime_payment_under_8_hours')->nullable();
            $table->integer('salary_travel_expenses')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('work_situations', function(Blueprint $table) {
            //
        });
    }
};
