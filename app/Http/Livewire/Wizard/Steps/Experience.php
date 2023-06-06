<?php

namespace App\Http\Livewire\Wizard\Steps;

use App\Enums\YearsExperienceEnum;
use App\Models\LanguageRank;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Spatie\LivewireWizard\Components\StepComponent;

class Experience extends StepComponent
{
    public User $user;

    public $languageRankModel = [];

    public $selectedExperiences = [];

    public function mount()
    {
        $this->user = Auth::user();
        $this->languageRankModel = $this->user->languagesRanks->keyBy('id')->toArray();
    }

    protected $rules = [
        'languagesRanks.*.years_of_experience' => ['nullable'],
    ];

    public function stepInfo(): array
    {
        return [
            'label' => 'Expérience',
            'description' => 'Renseignez votre expérience sur chaque langage',
            'long_description' => 'Pour mieux anticiper les besoins des clients, enseignez votre expérience sur chaque langage',
        ];
    }

    public function updatedLanguageRankModel($value, $id)
    {
        $languageRank = LanguageRank::whereId($id)->firstOrFail();
        $languageRank->update(['years_of_experience' => $value]);
    }

    public function finishSetup()
    {
        $this->user->initiated = 1;
        $this->user->save();
        $this->user->refresh();
        return redirect()->to('dashboard');
    }

    public function render()
    {
        return view('livewire.wizard.steps.experience');
    }
}
