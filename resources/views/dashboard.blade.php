<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
                @developer
                    @if (!Auth::user()->initiated)
                        <livewire:wizard.developer-wizard :user="Auth::user()" show-step="codewars"/>
                    @else
                        <livewire:dashboard.developer />
                    @endif
                @enddeveloper
                @hrmanager
                    <livewire:dashboard.hr />
                @endhrmanager
                @commercial
                    je suis un commercial!
                @endcommercial
            </div>
        </div>
    </div>
</x-app-layout>
