<?php

namespace App\Http\Livewire\Wizard\Steps;

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
            $response = Http::withHeaders(['Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7'])->get('https://www.codewars.com/api/v1/users/' . $this->codewars_username)->throw()->json();
            if ($languagesRanks = Arr::get($response, 'ranks.languages')) {
                $this->user->codewars_username = $this->codewars_username;
                foreach ($languagesRanks as $language => $rank) {
                    $this->user->languagesRanks()->create([
                        'language_name' => $language,
                        'rank_name' => $rank['name'],
                        'rank' => $rank['rank'],
                        'score' => $rank['score'],
                    ]);
                }
            }
            $this->user->save();
        } catch (\Throwable $th) {
            if ($th->response->notFound()) {
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
