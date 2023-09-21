<div>

    <form @submit.prevent="updateLivewire" x-data="workSituation" class="flex gap-4">
        <div class="w-[96px] flex flex-col justify-center items-center gap-2">
            <div @click="month++"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer"> &uarr;
            </div>
            <input x-model.number="month" type="number" min="0" max="13"
                   class="w-full form-input rounded text-right">
            <div @click="month--"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer"> &darr;
            </div>
        </div>
        <div class="w-[96px] flex flex-col justify-center items-center gap-2">
            <div @click="year++"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer"> &uarr;
            </div>
            <input x-model.number="year" type="number" min="2000" max="{{ now()->year }}"
                   class="w-full form-input rounded text-right">
            <div @click="year--"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer">
                &darr;
            </div>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>

    <div>{{ $user_id }}</div>
    <div>{{ $year }}</div>
    <div>{{ $month }}</div>
</div>

@pushonce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('workSituation', () => ({
                year: @this.entangle('year').defer,
                month: @this.entangle('month').defer,

                payment_at: @this.entangle('payment_at').defer,
                days_worked: @this.entangle('days_worked').defer,
                vacation_full_days: @this.entangle('vacation_full_days').defer,
                vacation_half_days: @this.entangle('vacation_half_days').defer,
                vacation_time_off: @this.entangle('vacation_time_off').defer,
                special_vacation_full_days: @this.entangle('special_vacation_full_days').defer,
                special_vacation_half_days: @this.entangle('special_vacation_half_days').defer,
                special_vacation_time_off: @this.entangle('special_vacation_time_off').defer,
                absence_days: @this.entangle('absence_days').defer,
                absence_hours: @this.entangle('absence_hours').defer,
                leave_without_pay_days: @this.entangle('leave_without_pay_days').defer,
                leave_without_pay_hours: @this.entangle('leave_without_pay_hours').defer,
                additional_hours: @this.entangle('additional_hours').defer,
                early_shifts_days: @this.entangle('early_shifts_days').defer,
                no_lunch_days: @this.entangle('no_lunch_days').defer,
                holiday_work_overtime: @this.entangle('holiday_work_overtime').defer,
                holiday_work_compensatory_time_off: @this.entangle('holiday_work_compensatory_time_off').defer,
                temporary_closing_school_days: @this.entangle('temporary_closing_school_days').defer,
                temporary_holiday_closure_hours: @this.entangle('temporary_holiday_closure_hours').defer,
                work_at_home_days: @this.entangle('work_at_home_days').defer,
                conference_fee: @this.entangle('conference_fee').defer,
                overtime_over_8_hours: @this.entangle('overtime_over_8_hours').defer,
                overtime_under_8_hours: @this.entangle('overtime_under_8_hours').defer,
                comment : @this.entangle('comment').defer,

                init() {
                    this.$watch('year', (v) => {
                        if (v <= 2000) {
                            this.year = 2000;
                        }

                        if (v >= {{ now()->year }}) {
                            this.year = {{ now()->year }};

                            if (this.month > {{ now()->month }}) {
                                this.month = {{ now()->month }};
                            }
                        }
                    });

                    this.$watch('month', (v) => {
                        if (v <= 0) {
                            this.year = this.year - 1;
                            this.month = 12;
                        }

                        if (v >= 13) {
                            this.year = this.year + 1;
                            this.month = 1;
                        }

                        if (this.year >= {{ now()->year }} && this.month >= {{ now()->month }}) {
                            this.year = {{ now()->year }};
                            this.month = {{ now()->month }};
                        }
                    });
                },

                updateLivewire() {
                    @this.
                    render();
                },
            }));
        });
    </script>
@endpushonce
