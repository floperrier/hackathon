<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">
                <a class="btn" href="{{ route('training-list') }}">Retour</a>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight text-center mb-2">{{ $training->name }}</h2>

                    <p class="text-lg text-center">{{ $training->description }}</p>

                    <div class="flex flex-col items-end">
                        <span>
                            Durée :
                            @if($training->duration / 60 / 60 / 24 >= 1)
                                {{ (int) ($training->duration / 60 / 60 / 24) }} j
                                {{ (int) ($training->duration / 60 / 60) % 24 }} h
                                {{ (int) $training->duration / 60 % 60 }} min
                            @elseif($training->duration / 60 / 60 >= 1)
                                {{ (int) ($training->duration / 60 / 60) }} h
                                {{ (int) $training->duration / 60 % 60 }} min
                            @else
                                {{ $training->duration / 60 }} min
                            @endif
                        </span>

                        <span class="block mt-2">
                            Carbon score : {{ $training->profit_carbon_score }}
                        </span>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
