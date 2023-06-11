@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue dark:focus:border-blue focus:ring-blue dark:focus:ring-blue rounded-md shadow-sm']) !!}>
