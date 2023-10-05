<div>

    <form @submit.prevent="updateLivewire" x-data="workSituation" class="flex gap-4">
        <div class="w-[96px] flex flex-col justify-center items-center gap-2">
            <div @click="month++"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer">
                &uarr;
            </div>
            <input x-model.number="month" type="number" min="0" max="13"
                   class="w-full form-input rounded text-right">
            <div @click="month--"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer">
                &darr;
            </div>
        </div>
        <div class="w-[96px] flex flex-col justify-center items-center gap-2">
            <div @click="year++"
                 class="w-full border  text-center px-4 py-2 rounded hover:bg-black hover:bg-opacity-20 cursor-pointer">
                &uarr;
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

    <form wire:submit="onSubmit" class="border rounded p-4 flex flex-col gap-4">
        <h1>{{ $year }}年{{ $month }}月分</h1>

        <x-form.partials.input type="date" wire:model="form.payment_at">
            支払日
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.days_worked" type="number" min="0" max="31">
            実際に出勤した日数
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.vacation_full_days" type="number" min="0" max="31">
            有休休暇（1日休）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.vacation_half_days" type="number" min="0" max="31">
            有休休暇（半日）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.vacation_time_off" type="number" min="0" max="31">
            有休休暇（時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.special_vacation_full_days" type="number" min="0" max="31">
            特別休暇（有休扱い　1日休）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.special_vacation_half_days" type="number" min="0" max="31">
            特別休暇（有休扱い　半日休）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.special_vacation_time_off" type="number" min="0" max="200" step="0.25">
            特別休暇（有休扱い　時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.absence_days" type="number" min="0" max="31">
            欠勤（日数）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.absence_hours" type="number" min="0" max="200" step="0.25">
            欠勤（時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.leave_without_pay_days" type="number" min="0" max="31">
            無給休暇（忌引・看護休暇）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.leave_without_pay_hours" type="number" min="0" max="200" step="0.25">
            無給休暇（時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.additional_hours" type="number" min="0" max="200" step="0.25">
            土曜日等にいつもより多め勤務（追加時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.early_shifts_days" type="number" min="0" max="31">
            早番の回数
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.no_lunch_days" type="number" min="0" max="31">
            給食なしの日数
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.holiday_work_overtime" type="number" min="0" max="31">
            休日出勤（残業扱い）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.holiday_work_compensatory_time_off" type="number" min="0" max="31">
            休日出勤（代休）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.temporary_closing_school_days" type="number" min="0" max="31">
            臨時休園（日数）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.temporary_holiday_closure_hours" type="number" min="0" max="200"
                               step="0.25">
            臨時休園（時間）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.work_at_home_days" type="number" min="0" max="31">
            在宅勤務
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.conference_fee" type="number" min="0" max="31">
            会議費/宿泊費 ￥2000（学童のみ）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.overtime_over_8_hours" type="number" min="0" max="200" step="0.25">
            残業時間（1日の勤務が8時間超えた分）
        </x-form.partials.input>

        <x-form.partials.input wire:model="form.overtime_under_8_hours" type="number" min="0" max="200" step="0.25">
            残業時間（1日の勤務が8時間未満の分）
        </x-form.partials.input>

        <x-form.partials.textarea wire:model="form.comment">
            備考
        </x-form.partials.textarea>

        <div>
            <button type="submit">SAVE</button>
        </div>
    </form>
</div>

@pushonce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('workSituation', () => ({
                year: @entangle('year'),
                month: @entangle('month'),

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
                    setDate(this.year, this.month);
                },
            }));
        });
    </script>
@endpushonce
