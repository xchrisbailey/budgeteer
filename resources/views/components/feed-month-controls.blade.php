{{-- feed month and change buttons --}}
<div class="flex items-center justify-between w-full px-3 py-2 mb-2 md:justify-center">
    <div>
        <a href="{{ route('dashboard', ['month' => $previousDate['month'], 'year' => $previousDate['year']]) }}" class="inline-flex p-1 mr-2 bg-gray-100 rounded-full shadow transition duration-200 ease-in-out hover:bg-gray-200 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
    </div>
    <div>
        <h2 class="mx-3 text-2xl font-semibold tracking-wider text-gray-900 uppercase">
            {{ $currentMonth && $currentYear ? date('F Y', strtotime($currentYear . '/' . $currentMonth . '/1')) : date('F Y') }}
        </h2>
    </div>
    <div>
        <a href="{{ route('dashboard', ['month' => $nextDate['month'], 'year' => $nextDate['year']]) }}"
            class="inline-flex p-1 ml-2 bg-gray-100 rounded-full shadow transition duration-200 ease-in-out hover:bg-gray-200 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</div>
