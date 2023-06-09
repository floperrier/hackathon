<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">
                <div>
                    <div class="flex justify-end">
                        <a class="btn" href="{{ route('training-add') }}" >Ajouter</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                            <th>Noms</th>
                            <th>Durée</th>
                            <th>Carbon score</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $training)
                                <tr>
                                    <td>
                                        {{ $training->name }}
                                    </td>
                                    <td>
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
                                    </td>
                                    <td> {{ $training->profit_carbon_score }} </td>
                                    <th>
                                        <a class="btn btn-ghost btn-xs" href="{{ route('training-show', $training->id) }}">details</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>

                            {{ $trainings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
