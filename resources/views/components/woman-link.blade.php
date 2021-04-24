@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block pt-1 px-3 w-full h-full bg-white border border-black font-bold text-red-900 font-bold rounded-2xl hover:bg-blue-200 text-center max-w-max leading-4 max-h-7 mb-2'
            : 'inline-block py-1 px-3 w-full h-full bg-blue-600 border border-gray-900 font-bold text-white hover:bg-blue-300 hover:text-red-500 rounded-2xl text-center max-w-max leading-4 max-h-7 mb-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>