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
            <a href="#"
                class="inline-flex p-1 mr-2 bg-blue-400 rounded-full shadow transition duration-200 ease-in-out hover:bg-blue-300 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>
        <div>
            <h2 class="mx-3 text-2xl font-semibold tracking-wider text-gray-900 uppercase">{{ date('F Y') }}</h2>
        </div>
        <div>
            <a href="#"
                class="inline-flex p-1 ml-2 bg-blue-400 rounded-full shadow transition duration-200 ease-in-out hover:bg-blue-300 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>


    <div class="mb-3 grid grid-cols-1 gap-4 md:grid-cols-2">
        {{-- entry chart --}}
        <x-feed-char :entries="$entries" />

        {{-- entry stats --}}
        <x-entry-status :entries="$entries" />
    </div>

    {{-- entry table --}}
    <div class="overflow-hidden border-b border-gray-200 rounded shadow">
        <x-entry-table :entries="$entries" />
    </div>

    <div class="sticky bottom-0 flex justify-end w-full px-3 py-4">
        <a href="{{ route('entry.create') }}"
            class="inline-flex items-center justify-center p-3 bg-purple-400 rounded-full shadow-lg transition duration-200 ease-in-out hover:bg-purple-300 hover:shadow outline:none focus:none">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-7 h-7 text-semibold" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>
</div>
