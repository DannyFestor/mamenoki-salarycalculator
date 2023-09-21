<?php

namespace App\Livewire\Forms;

use App\Models\WorkSituation;
use Livewire\Attributes\Rule;
use Livewire\Form;

class WorkSituationForm extends Form
{
    #[Rule(['nullable', 'date'])]
    public ?string $payment_at;

    #[Rule(['required', 'numeric'])]
    public int $days_worked = 0;

    #[Rule(['required', 'numeric'])]
    public int $vacation_full_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $vacation_half_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $vacation_time_off = 0;

    #[Rule(['required', 'numeric'])]
    public int $special_vacation_full_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $special_vacation_half_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $special_vacation_time_off = 0;

    #[Rule(['required', 'numeric'])]
    public int $absence_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $absence_hours = 0;

    #[Rule(['required', 'numeric'])]
    public int $leave_without_pay_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $leave_without_pay_hours = 0;

    #[Rule(['required', 'numeric'])]
    public int $additional_hours = 0;

    #[Rule(['required', 'numeric'])]
    public int $early_shifts_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $no_lunch_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $holiday_work_overtime = 0;

    #[Rule(['required', 'numeric'])]
    public int $holiday_work_compensatory_time_off = 0;

    #[Rule(['required', 'numeric'])]
    public int $temporary_closing_school_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $temporary_holiday_closure_hours = 0;

    #[Rule(['required', 'numeric'])]
    public int $work_at_home_days = 0;

    #[Rule(['required', 'numeric'])]
    public int $conference_fee = 0;

    #[Rule(['required', 'numeric'])]
    public int $overtime_over_8_hours = 0;

    #[Rule(['required', 'numeric'])]
    public int $overtime_under_8_hours = 0;

    #[Rule(['nullable', 'string'])]
    public ?string $comment = null;

    public function setWorkSituation(WorkSituation $workSituation): void
    {
        $this->payment_at = $workSituation->payment_at->format('Y-m-d');
        $this->days_worked = $workSituation->days_worked;
        $this->vacation_full_days = $workSituation->vacation_full_days;
        $this->vacation_half_days = $workSituation->vacation_half_days;
        $this->vacation_time_off = $workSituation->vacation_time_off;
        $this->special_vacation_full_days = $workSituation->special_vacation_full_days;
        $this->special_vacation_half_days = $workSituation->special_vacation_half_days;
        $this->special_vacation_time_off = $workSituation->special_vacation_time_off;
        $this->absence_days = $workSituation->absence_days;
        $this->absence_hours = $workSituation->absence_hours;
        $this->leave_without_pay_days = $workSituation->leave_without_pay_days;
        $this->leave_without_pay_hours = $workSituation->leave_without_pay_hours;
        $this->additional_hours = $workSituation->additional_hours;
        $this->early_shifts_days = $workSituation->early_shifts_days;
        $this->no_lunch_days = $workSituation->no_lunch_days;
        $this->holiday_work_overtime = $workSituation->holiday_work_overtime;
        $this->holiday_work_compensatory_time_off = $workSituation->holiday_work_compensatory_time_off;
        $this->temporary_closing_school_days = $workSituation->temporary_closing_school_days;
        $this->temporary_holiday_closure_hours = $workSituation->temporary_holiday_closure_hours;
        $this->work_at_home_days = $workSituation->work_at_home_days;
        $this->conference_fee = $workSituation->conference_fee;
        $this->overtime_over_8_hours = $workSituation->overtime_over_8_hours;
        $this->overtime_under_8_hours = $workSituation->overtime_under_8_hours;
        $this->comment = $workSituation->comment;
    }
}
