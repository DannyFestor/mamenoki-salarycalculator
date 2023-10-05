<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkSituation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'year',
        'month',
        'payment_at',
        'days_worked',
        'vacation_full_days',
        'vacation_half_days',
        'vacation_time_off',
        'special_vacation_full_days',
        'special_vacation_half_days',
        'special_vacation_time_off',
        'absence_days',
        'absence_hours',
        'leave_without_pay_days',
        'leave_without_pay_hours',
        'additional_hours',
        'early_shifts_days',
        'no_lunch_days',
        'holiday_work_overtime',
        'holiday_work_compensatory_time_off',
        'temporary_closing_school_days',
        'temporary_holiday_closure_hours',
        'work_at_home_days',
        'conference_fee',
        'overtime_over_8_hours',
        'overtime_under_8_hours',
        'comment',
        'salary_working_days_with_vacation',
        'salary_working_hours_with_vacation',
        'salary_overtime_payment_over_8_hours',
        'salary_overtime_payment_under_8_hours',
        'salary_travel_expenses',
    ];

    protected $casts = [
        'payment_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function testattribute(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $value,
            set: fn($value) => $value,
        );
    }
}
