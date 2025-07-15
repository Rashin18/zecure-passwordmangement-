@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'border-indigo-500 text-gray-900'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5']) }}>
    {{ $slot }}
</a>