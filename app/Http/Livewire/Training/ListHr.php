<?php

namespace App\Http\Livewire\Training;

use Livewire\Component;

class ListHr extends Component
{

    public function render()
    {

        $trainings = \App\Models\Training::paginate(5);

        return view('livewire.training.list-hr', [
            'trainings' => $trainings
        ]);
    }
}
