<div id="alertBox"
    class="text-white mx-6 lg:mx-8 px-6 py-4 border-0 rounded relative mb-4 shadow {{ $kind == 'error' ? 'bg-red-500' : 'bg-green-500' }} transition duration-300 ease-in-out">
    <span class="inline-block mr-5 text-xl align-middle">
        @if ($kind === 'error')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        @endif
    </span>
    <span class="inline-block mr-8 text-white align-middle">
        <strong class="capitalize">{{ $message }}</strong>
    </span>
    <button id="alertBtn"
        class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none hover:text-gray-200">
        <span>×</span>
    </button>
</div>
