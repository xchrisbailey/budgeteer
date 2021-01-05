<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Entry') }}
        </h2>
    </x-slot>
    <div class="w-full md:w-1/2 p-5 mx-auto mt-10 bg-white rounded">
        <form action="/entry/{{ $entry->id }}" method="post">
            @csrf
            @method("PUT")
            <label for="amount" class="text-xs font-semibold text-gray-600 uppercase">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" value="{{ cents_to_dollars($entry->amount) }}"
                class="w-full mb-3 text-black bg-gray-200 border border-gray-200 rounded">
            <label for="description" class="text-xs font-semibold text-gray-600 uppercase">Description</label>
            <input type="text" name="description" id="description" value="{{ $entry->description }}"
                class="w-full mb-3 text-black bg-gray-200 border border-gray-200 rounded">
            <label for="category" class="text-xs font-semibol text-gray-600 uppercase">category</label>
            <select name="category" id="category" 
                class="w-full mb-3 text-black bg-gray-200 border border-gray-200 rounded">
                <option value="want" @if($entry->category == "want") selected @endif>want</option>
                <option value="need" @if($entry->category == "need") selected @endif>need</option>
                <option value="savings" @if($entry->category == "savings") selected @endif>savings</option>
                <option value="income" @if($entry->category == "income") selected @endif>income</option>
            </select>
            <input type="submit" value="update"
                class="w-full px-3 py-2 mt-2 font-medium text-white uppercase bg-purple-600 rounded shadow-lg cursor-pointer hover:bg-purple-700">
        </form>
    </div>
</x-app-layout>
