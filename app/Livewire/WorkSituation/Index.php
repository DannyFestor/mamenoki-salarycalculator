<?php

namespace App\Livewire\WorkSituation;

use App\Models\User;
use App\Models\WorkSituation;
use Livewire\Component;

class Index extends Component
{
    public int $user_id;
    protected $queryString = ['year'];

    public ?int $year = null;
    public ?int $month = null;
    public ?string $payment_at = null;
    public ?int $days_worked = null;
    public ?int $vacation_full_days = null;
    public ?int $vacation_half_days = null;
    public ?int $vacation_time_off = null;
    public ?int $special_vacation_full_days = null;
    public ?int $special_vacation_half_days = null;
    public ?int $special_vacation_time_off = null;
    public ?int $absence_days = null;
    public ?int $absence_hours = null;
    public ?int $leave_without_pay_days = null;
    public ?int $leave_without_pay_hours = null;
    public ?int $additional_hours = null;
    public ?int $early_shifts_days = null;
    public ?int $no_lunch_days = null;
    public ?int $holiday_work_overtime = null;
    public ?int $holiday_work_compensatory_time_off = null;
    public ?int $temporary_closing_school_days = null;
    public ?int $temporary_holiday_closure_hours = null;
    public ?int $work_at_home_days = null;
    public ?int $conference_fee = null;
    public ?int $overtime_over_8_hours = null;
    public ?int $overtime_under_8_hours = null;
    public ?string $comment = null;

    public function mount(User $user): void
    {
        $this->user_id = $user->id;

        if (!$this->year) {
            $this->year = now()->year;
        }

        if (!$this->month) {
            $this->month = now()->month;
        }
    }

    public function getQueryString(): array
    {
        return [
            'year' => ['except' => now()->year],
            'month' => ['except' => now()->month],
        ];
    }

    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($this->year && $this->month) {
            $workSituation = WorkSituation::query()
                ->where('user_id', $this->user_id)
                ->where('year', $this->year)
                ->where('month', $this->month)
                ->first();

            if ($workSituation) {
                $this->year = $workSituation->year;
                $this->month = $workSituation->month;
                $this->payment_at = $workSituation->payment_at;
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

        return view('livewire.work-situation.index');
    }
}
