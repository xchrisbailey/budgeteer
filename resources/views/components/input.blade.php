@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => 'text-black bg-white border
border-gray-200 rounded focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50',
]) !!}>
