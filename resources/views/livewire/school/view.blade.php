<form x-data="school" @submit.prevent="onSubmit" class="grid md:grid-cols-2 xl:grid-cols-3 pb-12">
    <section class="flex flex-col gap-4 p-4">
        <x-form.partials.input x-model="name" required>
            名義
        </x-form.partials.input>
    </section>


    <section class="md:col-span-2 xl:col-span-3 flex justify-end px-4 pt-8">
        <x-form.partials.button>保存</x-form.partials.button>
</form>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('school', () => ({
                'name': @this.entangle('name').defer,

                onSubmit: () => {
                    @this.
                        onSubmit();
                },
            }));
        });
    </script>
@endpush
