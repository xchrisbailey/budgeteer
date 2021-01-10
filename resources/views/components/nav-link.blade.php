@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-2 pt-1 border-b-2 border-purple-300 text-sm font-medium leading-5 text-gray-200
focus:outline-none focus:border-purple-300 transition duration-150 ease-in-out bg-gray-900 uppercase'
: 'inline-flex items-center px-2 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200
hover:text-gray-300 hover:border-purple-300 focus:outline-none focus:text-gray-300 focus:border-purple-700 transition
duration-150 ease-in-out uppercase';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
