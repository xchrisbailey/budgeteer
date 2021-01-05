<div class="flex flex-col items-center justify-center w-screen h-screen column">

    <div class="flex items-start justify-center w-full py-3 md:w-1/3 bg-purple-700 text-white rounded-lg shadow-md md:w-1/3 mb-3">
        <h1 class="text-lg font-semibold uppercase">
            {{ $title }}
        </h1>
    </div>

    <div class="flex flex-col justify-between w-full p-3 mx-2 bg-white rounded-lg shadow-md md:w-1/3">
        {{ $slot }}
    </div>

    <div class="flex justify-end w-full mt-1 mr-1 md:w-1/3">
        <a class="text-sm text-gray-900 underline uppercase hover:text-gray-700" href="{{ url()->previous() }}">back</a>
    </div>
</div>
