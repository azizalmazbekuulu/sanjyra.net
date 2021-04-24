@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block whitespace-nowrap py-1 px-3 w-full h-full bg-green-500 border border-black font-bold leading-6 text-red-900 hover:outline-none hover:border-gray-500 hover:bg-green-400 font-bold rounded-2xl text-center'
            : 'inline-block whitespace-nowrap py-1 px-3 w-full h-full bg-blue-600 border border-gray-900 font-bold leading-6 text-white hover:bg-blue-300 hover:text-red-500 rounded-2xl text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>