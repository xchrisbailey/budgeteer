@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-purple-400 text-sm font-medium leading-5 text-gray-900
focus:outline-none focus:border-purple-700 transition duration-150 ease-in-out bg-purple-300'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500
hover:text-gray-700 hover:border-purple-700 focus:outline-none focus:text-gray-700 focus:border-purple-700 transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
