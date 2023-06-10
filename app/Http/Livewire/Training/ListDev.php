<?php

namespace App\Http\Livewire\Training;

use Auth;
use Livewire\Component;

class ListDev extends Component
{

    public $trainingObtained = false;

    public function showTraining($trainingId)
    {
        $training = \App\Models\Training::find($trainingId);
        $this->emit('showTrainingModal', $training);
    }

    public function claimTraining($trainingId)
    {
        $training = \App\Models\Training::find($trainingId);
        $user = Auth::user();

        if (!$user->trainings->contains($training)) {
            $user->trainings()->attach($training->id);
            $this->emit('trainingClaimed');
        }
        else {
            $this->emit('trainingClaimedError');
        }
    }

    public function render()
    {

        $trainings = \App\Models\Training::paginate(5);

        return view('livewire.training.list-dev', [
            'trainings' => $trainings
        ]);
    }
}
