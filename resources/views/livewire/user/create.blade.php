<form x-data="user" @submit.prevent="onSubmit" class="grid md:grid-cols-2 xl:grid-cols-3">
    <section class="flex flex-col gap-4 p-4">
        <h2>基本情報</h2>

        <x-user.create.partials.input x-model="email" type="email" required>
            {{ __('validation.attributes.email') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="last_name" required>
            {{ __('validation.attributes.last_name') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="first_name" required>
            {{ __('validation.attributes.first_name') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="is_school_club" required>
            {{ __('validation.attributes.is_school_club') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="birthday" type="date" required>
            {{ __('validation.attributes.birthday') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="start_date" type="date" required>
            {{ __('validation.attributes.start_date') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="end_date" required>
            {{ __('validation.attributes.end_date') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="employee_number" required>
            {{ __('validation.attributes.employee_number') }}
        </x-user.create.partials.input>
    </section>

    <section class="flex flex-col gap-4 p-4">
        <h2>就労条件</h2>

        <!-- todo: make booleans / switch -->
        <x-user.create.partials.input x-model="salary_type" required>
            {{ __('validation.attributes.salary_type') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="staff_type" required>
            {{ __('validation.attributes.staff_type') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="work_system" required>
            {{ __('validation.attributes.work_system') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="daily_hours" required>
            {{ __('validation.attributes.daily_hours') }}
        </x-user.create.partials.input>
        <x-user.create.partials.toggle x-model="has_parking_spot" required>
            {{ __('validation.attributes.has_parking_spot') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_meal" required>
            {{ __('validation.attributes.has_meal') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_break" required>
            {{ __('validation.attributes.has_break') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_health_insurance" required>
            {{ __('validation.attributes.has_health_insurance') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_welfare_pension" required>
            {{ __('validation.attributes.has_welfare_pension') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_nursing_insurance" required>
            {{ __('validation.attributes.has_nursing_insurance') }}
        </x-user.create.partials.toggle>
        <x-user.create.partials.toggle x-model="has_unemployment_insurance" required>
            {{ __('validation.attributes.has_unemployment_insurance') }}
        </x-user.create.partials.toggle>
    </section>

    <section class="flex flex-col gap-4 p-4">
        <h2>給与オプション</h2>

        <x-user.create.partials.input x-model="monthly_employee_base_salary" type="number" min="0" step="1" required>
            {{ __('validation.attributes.monthly_employee_base_salary') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="monthly_employee_base_salary_hourly" type="number" min="0" step="1" required>
            {{ __('validation.attributes.monthly_employee_base_salary_hourly') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="hourly_employee_base_salary" type="number" min="0" step="1" required>
            {{ __('validation.attributes.hourly_employee_base_salary') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="treatment_improvement_1" type="number" min="0" step="1" required>
            {{ __('validation.attributes.treatment_improvement_1') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="treatment_improvement_2" type="number" min="0" step="1" required>
            {{ __('validation.attributes.treatment_improvement_2') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="position_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.position_allowance') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="job_title_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.job_title_allowance') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="qualification_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.qualification_allowance') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="housing_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.housing_allowance') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="dependent_care_allowance" type="number" min="0" step="1" required>
            {{ __('validation.attributes.dependent_care_allowance') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="commuting_allowance_monthly" type="number" min="0" step="1" required>
            {{ __('validation.attributes.commuting_allowance_monthly') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="commuting_allowance_workdays" type="number" min="0" step="1" required>
            {{ __('validation.attributes.commuting_allowance_workdays') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="municipal_inhabitant_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.municipal_inhabitant_tax') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="refund_of_withholding_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.refund_of_withholding_tax') }}
        </x-user.create.partials.input>
        <x-user.create.partials.input x-model="income_tax" type="number" min="0" step="1" required>
            {{ __('validation.attributes.income_tax') }}
        </x-user.create.partials.input>
    </section>

    <section>
        <button type="submit">SUBMIT</button>
    </section>

    @foreach($errors as $error)
        <div>{{ $error }}</div>
    @endforeach
</form>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('user', () => ({
                // User Info
                'email': @this.entangle('email').defer,
                'last_name': @this.entangle('last_name').defer,
                'first_name': @this.entangle('first_name').defer,
                'is_school_club': @this.entangle('is_school_club').defer,
                'birthday': @this.entangle('birthday').defer,
                'start_date': @this.entangle('start_date').defer,
                'end_date': @this.entangle('end_date').defer,
                'employee_number': @this.entangle('employee_number').defer,

                // Work Info
                'salary_type': @this.entangle('salary_type').defer,
                'staff_type': @this.entangle('staff_type').defer,
                'work_system': @this.entangle('work_system').defer,
                'daily_hours': @this.entangle('daily_hours').defer,
                'has_parking_spot': @this.entangle('has_parking_spot').defer,
                'has_meal': @this.entangle('has_meal').defer,
                'has_break': @this.entangle('has_break').defer,
                'has_health_insurance': @this.entangle('has_health_insurance').defer,
                'has_welfare_pension': @this.entangle('has_welfare_pension').defer,
                'has_nursing_insurance': @this.entangle('has_nursing_insurance').defer,
                'has_unemployment_insurance': @this.entangle('has_unemployment_insurance').defer,

                // Salary Info
                'monthly_employee_base_salary': @this.entangle('monthly_employee_base_salary').defer,
                'monthly_employee_base_salary_hourly': @this.entangle('monthly_employee_base_salary_hourly').defer,
                'hourly_employee_base_salary': @this.entangle('hourly_employee_base_salary').defer,
                'treatment_improvement_1': @this.entangle('treatment_improvement_1').defer,
                'treatment_improvement_2': @this.entangle('treatment_improvement_2').defer,
                'position_allowance': @this.entangle('position_allowance').defer,
                'job_title_allowance': @this.entangle('job_title_allowance').defer,
                'qualification_allowance': @this.entangle('qualification_allowance').defer,
                'housing_allowance': @this.entangle('housing_allowance').defer,
                'dependent_care_allowance': @this.entangle('dependent_care_allowance').defer,
                'commuting_allowance_monthly': @this.entangle('commuting_allowance_monthly').defer,
                'commuting_allowance_workdays': @this.entangle('commuting_allowance_workdays').defer,
                'municipal_inhabitant_tax': @this.entangle('municipal_inhabitant_tax').defer,
                'refund_of_withholding_tax': @this.entangle('refund_of_withholding_tax').defer,
                'income_tax': @this.entangle('income_tax').defer,

                onSubmit: () => {
                    @this.
                    onSubmit();
                },
            }));
        });
    </script>
@endpush
