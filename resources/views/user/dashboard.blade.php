<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Let's check in on your spending <span class="text-blue-600">{{ current_user()->name }}</span>
        </h2>
    </x-slot>
    <section class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-feed-month-controls :previousDate="$previous_date" :nextDate="$next_date"
                :currentMonth="request()->month" :currentYear="request()->year" />

            @if (isset($entries) && !$entries->isEmpty())
                <div class="grid grid-cols-1 gap-4 mb-3 md:grid-cols-2">
                    {{-- entry chart --}}
                    <x-entry-chart :entries="$entries" />

                    {{-- entry stats --}}
                    <x-entry-stats :entries="$entries" />
                </div>

                {{-- entry table --}}
                <x-entry-table :entries="$entries" />
            @else
                <section class="flex justify-center p-4 mt-2 bg-white rounded shadow">
                    <h1 class="text-lg text-gray-900">No entries found for this period, <a
                            href="{{ route('entry.create') }}"
                            class="text-purple-700 underline hover:text-purple-500">please add some</a></h1>
                </section>
            @endif
        </div>
    </section>
    <x-slot name="fab">
        <section class="sticky bottom-0 flex justify-end w-full py-4 px-7">
            <a href="{{ route('entry.create') }}"
                class="inline-flex items-center justify-center p-3 transition duration-200 ease-in-out bg-purple-400 rounded-full shadow-lg hover:bg-purple-300 hover:shadow outline:none focus:none">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-7 h-7 text-semibold" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        </section>
    </x-slot>
</x-app-layout>
