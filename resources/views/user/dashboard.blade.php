<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Let's check in on your spending <span class="text-blue-600">{{ current_user()->name }}</span>
        </h2>
    </x-slot>
    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <px-8></px-8>
            @if (session()->has('message'))
                <div class="flex items-center w-full px-6 py-3 mx-auto my-4 text-lg bg-green-200 rounded-md">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-green-600 sm:w-5 sm:h-5">
                        <path fill="currentColor"
                            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                        </path>
                    </svg>
                    <span class="text-green-800">{{ session('message') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex items-center w-full px-6 py-3 mx-auto my-4 text-lg bg-red-200 rounded-md">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                        <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <span class="text-red-800">{{ $errors->first() }}</span>
                </div>
            @endif

            <x-feed-month-controls :previousDate="$previous_date" :nextDate="$next_date"
                :currentMonth="request()->month" :currentYear="request()->year" />

            <div class="mb-3 grid grid-cols-1 gap-4 md:grid-cols-2">
                {{-- entry chart --}}
                <x-feed-chart :entries="$entries" />

                {{-- entry stats --}}
                <x-entry-stats :entries="$entries" />
            </div>

            {{-- entry table --}}
            <x-entry-table :entries="$entries" />
        </div>
    </section>
    <x-slot name="fab">
        <section class="sticky bottom-0 flex justify-end w-full px-7 py-4">
            <a href="{{ route('entry.create') }}"
                class="inline-flex items-center justify-center p-3 bg-purple-400 rounded-full shadow-lg transition duration-200 ease-in-out hover:bg-purple-300 hover:shadow outline:none focus:none">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-7 h-7 text-semibold" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        </section>
    </x-slot>
</x-app-layout>
