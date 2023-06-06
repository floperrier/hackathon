<?php

namespace App\Http\Livewire\Wizard;

use App\Http\Livewire\Wizard\Steps\Codewars;
use App\Http\Livewire\Wizard\Steps\Experience;
use Spatie\LivewireWizard\Components\WizardComponent;

class DeveloperWizard extends WizardComponent
{
    public function steps() : array
    {
        return [
            Codewars::class,
            Experience::class,
        ];
    }
}
