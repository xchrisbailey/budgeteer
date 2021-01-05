<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Entry') }}
        </h2>
    </x-slot>
    <div class="w-full p-5 mx-auto mt-10 bg-white rounded-lg shadow md:w-1/2">
        <form action="/entry" method="post">
            @csrf
            <div>
                <x-label for="amount" :value="__('Amount')" />
                <x-input type="number" step="0.01" name="amount" id="amount" class="w-full mb-3 " required autofocus />
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
            <div class="flex justify-end">
                <x-button class="w-1/4 mt-2 bg-purple-600 hover:bg-purple-700">Add</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
