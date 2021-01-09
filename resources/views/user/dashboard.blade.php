<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
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

            <div class="container mx-auto">
                {{-- feed month and change buttons --}}
                <div class="flex items-center justify-between w-full px-3 py-2 mb-2 md:justify-center">
                    <div>
                        <a href="{{ route('dashboard', ['month' => $previous_date['month'], 'year' => $previous_date['year']]) }}"
                            class="inline-flex p-1 mr-2 transition duration-200 ease-in-out bg-blue-400 rounded-full
                            shadow hover:bg-blue-300 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    </div>
                    <div>
                        <h2 class="mx-3 text-2xl font-semibold tracking-wider text-gray-900 uppercase">
                            {{ request()->month && request()->year ? date('F Y', strtotime(request()->year . '/' . request()->month . '/1')) : date('F Y') }}
                        </h2>
                    </div>
                    <div>
                        <a href="{{ route('dashboard', ['month' => $next_date['month'], 'year' => $next_date['year']]) }}"
                            class="inline-flex p-1 ml-2 transition duration-200 ease-in-out bg-blue-400 rounded-full shadow hover:bg-blue-300 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mb-3 md:grid-cols-2">
                    {{-- entry chart --}}
                    <x-feed-chart :entries="$entries" />

                    {{-- entry stats --}}
                    <x-entry-stats :entries="$entries" />
                </div>

                {{-- entry table --}}
                <div class="overflow-hidden border-b border-gray-200 rounded shadow">
                    <table class="w-full bg-white table-auto">
                        <thead class="text-white bg-gray-800">
                            <tr>
                                <td class="px-4 py-3 text-sm font-semibold uppercase">Date</td>
                                <td class="px-4 py-3 text-sm font-semibold uppercase">Description</td>
                                <td class="px-4 py-3 text-sm font-semibold uppercase">Amount</td>
                                <td class="px-4 py-3 text-sm font-semibold uppercase">Category</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($entries as $entry)
                                <tr class="even:bg-gray-100">

                                    <td class="px-4 py-3">
                                        {{ date_create_from_format('Y-m-d', $entry->spend_date)->format('F d,Y') }}
                                    </td>
                                    <td class="px-4 py-3">{{ ucwords($entry->description) }}</td>
                                    <td class="px-4 py-3">
                                        @if ($entry->category === 'income')
                                            <span class="text-blue-800">${{ cents_to_dollars($entry->amount) }}</span>
                                        @else
                                            <span class="text-red-800">${{ cents_to_dollars($entry->amount) }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 uppercase">{{ $entry->category }}</td>
                                    <td class="flex flex-col justify-between px-4 py-3 md:flex-row md:justify-end">
                                        <a href="{{ route('entry.edit', $entry->id) }}"
                                            class="inline-flex p-2 mb-1 mr-2 transition duration-200 ease-in-out bg-yellow-300 rounded-full shadow md:mb-0 hover:bg-yellow-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 p-0 m-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('entry.delete', $entry->id) }}" method="POST"
                                            class="inline p-0 m-0">
                                            @csrf
                                            @method("DELETE")
                                            <button
                                                class="p-2 transition duration-200 ease-in-out bg-red-300 rounded-full shadow hover:bg-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>no entries</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky bottom-0 flex justify-end w-full px-3 py-4">
        <a href="{{ route('entry.create') }}"
            class="inline-flex items-center justify-center p-3 transition duration-200 ease-in-out bg-purple-400 rounded-full shadow-lg hover:bg-purple-300 hover:shadow outline:none focus:none">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-7 h-7 text-semibold" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>
</x-app-layout>
