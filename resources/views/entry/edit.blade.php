<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Entry') }}
        </h2>
    </x-slot>
    <div class="w-full p-5 mx-auto mt-10 bg-white rounded md:w-1/2">
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
                    <option value="income" @if ($entry->category == 'income') selected
                        @endif>income</option>
                </select>
                <input type="text" name="spend_date" value="{{ $entry->spend_date }}" hidden />
            </div>
            <div class="flex justify-end">
                <x-button class="w-1/4 mt-2 bg-purple-600 hover:bg-purple-700">Update</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
