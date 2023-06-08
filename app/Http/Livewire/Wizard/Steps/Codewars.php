<?php

namespace App\Http\Livewire\Wizard\Steps;

use App\Gamify\Points\RankGained;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Spatie\LivewireWizard\Components\StepComponent;

class Codewars extends StepComponent
{
    public $user;

    public $codewars_username;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Niveau technique',
            'description' => 'Quels langages connaissez-vous ?',
            'long_description' => 'Pour vous proposez des missions adaptées à votre niveau technique,
            nous avons besoin de savoir quels langages vous connaissez.',
        ];
    }

    public function getRanks()
    {
        try {
            $response = Http::get('https://www.codewars.com/api/v1/users/' . $this->codewars_username)->throw()->json();
            $this->user->codewars_score = Arr::get($response, 'ranks.overall.score');
            if ($languagesRanks = Arr::get($response, 'ranks.languages')) {
                $this->user->codewars_username = $this->codewars_username;
                $this->user->languagesRanks()->delete();
                foreach ($languagesRanks as $language => $rank) {
                    $languageRank = $this->user->languagesRanks()->create([
                        'language_name' => $language,
                        'rank_name' => $rank['name'],
                        'rank' => $rank['rank'],
                        'score' => $rank['score'],
                    ]);
                    for ($i = -8; $i <= $rank['rank']; $i++) {
                        $this->user->givePoint(new RankGained($languageRank, $i));
                    }
                }
            }
            $this->user->save();
        } catch (\Throwable $th) {
            if ($th?->response?->notFound()) {
                $this->addError('codewars_username', 'Le nom d\'utilisateur n\'existe pas');
                return;
            }
            $this->addError('codewars_username', 'Une erreur est survenue');
            return;
        }
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.wizard.steps.codewars');
    }
}
