<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">
                @hrmanager
                    <livewire:training.list-hr />
                @endhrmanager

                @developer
                    <livewire:training.list-dev />
                @enddeveloper
            </div>
        </div>
    </div>
</x-app-layout>
