@props(['value'])

<label {{ $attributes->merge(['class' => 'text-xs font-semibold text-gray-600 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
