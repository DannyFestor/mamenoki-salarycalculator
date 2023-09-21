<form wire:submit="onSubmit" class="grid md:grid-cols-2 xl:grid-cols-3 pb-12">
    <section class="flex flex-col gap-4 p-4">
        <h2>基本情報</h2>

        <x-form.partials.input wire:model="form.email" required>
            {{ __('validation.attributes.email') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.last_name" >
            {{ __('validation.attributes.last_name') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.first_name" required>
            {{ __('validation.attributes.first_name') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.birthday" type="date" required>
            {{ __('validation.attributes.birthday') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.start_date" type="date" required>
            {{ __('validation.attributes.start_date') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.end_date" type="date" required>
            {{ __('validation.attributes.end_date') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.employee_number" required>
            {{ __('validation.attributes.employee_number') }}
        </x-form.partials.input>
    </section>

    <section class="flex flex-col gap-4 p-4">
        <h2>就労条件</h2>

        <x-form.partials.select wire:model="form.salary_type" :enum="\App\Enums\SalaryType::class"
                                       :options="\App\Enums\SalaryType::toArray()" required>
            {{ __('validation.attributes.salary_type') }}
        </x-form.partials.select>
        <x-form.partials.select wire:model="form.staff_type" :enum="\App\Enums\StaffType::class"
                                       :options="\App\Enums\StaffType::toArray()" required>
            {{ __('validation.attributes.staff_type') }}
        </x-form.partials.select>
        <x-form.partials.select wire:model="form.work_system" :enum="\App\Enums\WorkSystem::class"
                                       :options="\App\Enums\WorkSystem::toArray()" required>
            {{ __('validation.attributes.work_system') }}
        </x-form.partials.select>
        <x-form.partials.input wire:model="form.daily_hours" type="number" min="0" max="10" step="0.25" required>
            {{ __('validation.attributes.daily_hours') }}
        </x-form.partials.input>
        <x-form.partials.toggle wire:model="form.has_parking_spot" required>
            {{ __('validation.attributes.has_parking_spot') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_meal" required>
            {{ __('validation.attributes.has_meal') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_break" required>
            {{ __('validation.attributes.has_break') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_health_insurance" required>
            {{ __('validation.attributes.has_health_insurance') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_welfare_pension" required>
            {{ __('validation.attributes.has_welfare_pension') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_nursing_insurance" required>
            {{ __('validation.attributes.has_nursing_insurance') }}
        </x-form.partials.toggle>
        <x-form.partials.toggle wire:model="form.has_unemployment_insurance" required>
            {{ __('validation.attributes.has_unemployment_insurance') }}
        </x-form.partials.toggle>
    </section>

    <section class="flex flex-col gap-4 p-4">
        <h2>給与オプション</h2>

        <x-form.partials.input wire:model="form.monthly_employee_base_salary" type="number" min="0" step="1" required>
            {{ __('validation.attributes.monthly_employee_base_salary') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.monthly_employee_base_salary_hourly" type="number" min="0" step="1"
                                      required>
            {{ __('validation.attributes.monthly_employee_base_salary_hourly') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.hourly_employee_base_salary" type="number" min="0" step="1" required>
            {{ __('validation.attributes.hourly_employee_base_salary') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.treatment_improvement_1" type="number" min="0" step="1" required>
            {{ __('validation.attributes.treatment_improvement_1') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.treatment_improvement_2" type="number" min="0" step="1" required>
            {{ __('validation.attributes.treatment_improvement_2') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.position_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.position_allowance') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.job_title_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.job_title_allowance') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.qualification_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.qualification_allowance') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.housing_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.housing_allowance') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.dependent_care_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.dependent_care_allowance') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.commuting_allowance_monthly" type="number" min="0" step="1" required>
            {{ __('validation.attributes.commuting_allowance_monthly') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.commuting_allowance_workdays" type="number" min="0" step="1" required>
            {{ __('validation.attributes.commuting_allowance_workdays') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.municipal_inhabitant_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.municipal_inhabitant_tax') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.refund_of_withholding_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.refund_of_withholding_tax') }}
        </x-form.partials.input>
        <x-form.partials.input wire:model="form.income_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.income_tax') }}
        </x-form.partials.input>
    </section>

    <section class="md:col-span-2 lg:col-span-3 mt-8 flex justify-end p-4">
        <x-form.partials.button type="submit">保存する</x-form.partials.button>
    </section>

</form>
