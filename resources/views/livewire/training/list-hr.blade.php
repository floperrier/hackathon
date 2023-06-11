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
                        <a class="btn btn-ghost btn-xs text-green" href="{{ route('training-show', $training->id) }}">details</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
        </table>

            {{ $trainings->links() }}
    </div>

</div>
