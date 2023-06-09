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
                            <th>Début</th>
                            <th>Fin</th>
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
                                        {{ $training->start_at }}
                                    </td>
                                    <td>
                                        {{ $training->end_at }}
                                    </td>
                                    <td> {{ $training->profit_carbon_score }} </td>
                                    <th>
                                        <button class="btn btn-ghost btn-xs">details</button>
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
