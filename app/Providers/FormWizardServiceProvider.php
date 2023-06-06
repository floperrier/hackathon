<?php

namespace App\Providers;

use App\Http\Livewire\DeveloperWizard;
use App\Http\Livewire\Steps\FundStep;
use App\Http\Livewire\Steps\PartnerStep;
use App\Http\Livewire\Steps\ProductStep;
use App\Http\Livewire\Steps\SubscriberStep;
use App\Http\Livewire\Wizard\Steps\Codewars;
use App\Http\Livewire\Wizard\Steps\Experience;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormWizardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('developer-wizard', DeveloperWizard::class);
        Livewire::component('codewars', Codewars::class);
        Livewire::component('experience', Experience::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
