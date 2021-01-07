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

                <td class="px-4 py-3">{{ date_create_from_format('Y-m-d', $entry->spend_date)->format('F d,Y') }}
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
                    <form action="{{ route('entry.delete', $entry->id) }}" method="POST" class="inline p-0 m-0">
                        @csrf
                        @method("DELETE")
                        <button
                            class="p-2 transition duration-200 ease-in-out bg-red-300 rounded-full shadow hover:bg-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
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
