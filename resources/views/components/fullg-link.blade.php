@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block font-normal text-gray-900 hover:text-gray-700 hover:underline'
            : 'inline-block font-normal text-blue-900 hover:text-blue-700 hover:none-underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>