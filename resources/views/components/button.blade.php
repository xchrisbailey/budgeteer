<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 py-2 font-medium text-white uppercase transition duration-300 ease-in-out rounded shadow-lg cursor-pointer hover:shadow']) }}>
    {{ $slot }}
</button>
