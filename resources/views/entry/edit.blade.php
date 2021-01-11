<x-app-layout>
    <x-slot name="imports">
        <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}" />
        <script src="{{ asset('js/flatpickr.js') }}"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Entry') }}
        </h2>
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="w-full p-5 mx-auto mt-5 bg-white rounded">
            <form action="/entry/{{ $entry->id }}" method="post">
                @csrf
                @method("PUT")
                <div>
                    <x-label for="amount" :value="__('Amount')" />
                    <x-input type="number" step="0.01" name="amount" id="amount"
                        value="{{ cents_to_dollars($entry->amount) }}" class="w-full mb-3" required />
                </div>
                <div>
                    <x-label for="description" :value="__('Description')" />
                    <x-input type="text" name="description" id="description" value="{{ $entry->description }}"
                        class="w-full mb-3" required />
                </div>
                <div>
                    <x-label for="category" :value="__('Category')" />
                    <select name="category" id="category"
                        class="w-full mb-3 text-black bg-white border border-gray-200 rounded" required>
                        <option value="want" @if ($entry->category == 'want') selected
                            @endif>want</option>
                        <option value="need" @if ($entry->category == 'need') selected
                            @endif>need</option>
                        <option value="savings" @if ($entry->category == 'savings')
                            selected
                            @endif>savings</option>
                        <option value="income" @if ($entry->category == 'income')
                            selected
                            @endif>income</option>
                    </select>
                </div>

                <div>
                    <x-label for="spend_date" :value="__('Spend Date')" />
                    <input type="date" name="spend_date" id="spend_date"
                        class="w-full mb-3 text-black bg-white border border-gray-200 rounded" />
                </div>

                <div class="flex justify-end">
                    <x-button class="w-1/4 mt-2 bg-purple-600 hover:bg-purple-700">Update</x-button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            flatpickr('#spend_date', {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                defaultDate: "{{ $entry->spend_date }}"
            });

        </script>
    </x-slot>
</x-app-layout>
