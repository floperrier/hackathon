@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-600 dark:border-red-600 text-sm font-medium leading-5 text-red-600 dark:text-red-600 focus:outline-none focus:border-red-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white dark:text-white hover:text-white dark:hover:text-white hover:border-white dark:hover:border-white focus:outline-none focus:text-white dark:focus:text-white focus:border-white dark:focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
