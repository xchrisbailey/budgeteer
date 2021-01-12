<x-app-layout>
    <x-slot name="imports">
        <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}" />
        <script src="{{ asset('js/flatpickr.js') }}"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Add Entry') }}</h2>
    </x-slot>
    <section class="mx-auto sm:px-6 lg:px-8">
        <div class="w-full p-5 mt-5 bg-white rounded-lg shadow">
            <form action="/entry" method="post">
                @csrf
                <div>
                    <x-label for="amount" :value="__('Amount')" />
                    <x-input type="number" step="0.01" name="amount" id="amount" class="w-full mb-3 " required
                        autofocus />
                </div>

                <div>
                    <x-label for="description" :value="__('Description')" />
                    <x-input type="text" name="description" id="description" class="w-full mb-3 " required />
                </div>

                <div>
                    <x-label for="category" :value="__('Category')" />
                    <select name="category" id="category"
                        class="w-full mb-3 text-black bg-white border border-gray-200 rounded" required>
                        <option value="want">want</option>
                        <option value="need">need</option>
                        <option value="savings">savings</option>
                        <option value="income">income</option>
                    </select>
                </div>

                <div>
                    <x-label for="spend_date" :value="__('Spend Date')" />
                    <input type="date" name="spend_date" id="spend_date"
                        class="w-full mb-3 text-black bg-white border border-gray-200 rounded" />
                </div>

                <div class="flex justify-end">
                    <x-button class="w-1/4 mt-2 bg-purple-600 hover:bg-purple-700">Add</x-button>
                </div>
            </form>
        </div>
    </section>
    <x-slot name="scripts">
        <script>
            flatpickr('#spend_date', {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                defaultDate: Date.now()
            });

        </script>
    </x-slot>
</x-app-layout>
