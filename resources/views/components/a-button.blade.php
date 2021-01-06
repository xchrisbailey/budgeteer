@php
$classes = 'px-3 py-2 mx-0 my-1 text-sm text-center uppercase transition duration-200 ease-in-out rounded shadow
md:my-0 md:mx-1 hover:shadow-none'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
