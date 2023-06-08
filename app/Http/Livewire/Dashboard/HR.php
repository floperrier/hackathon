<?php

namespace App\Http\Livewire\Dashboard;

use App\Enums\DevLangagesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Hr extends Component
{

    public $usersPerPage = 5;
    public $languages = [];

    public function render()
    {
        // display all developers
        $data = User::whereHas('roles', function(Builder $query) {
            $query->where('name', 'Developer');
        })->paginate($this->usersPerPage);
        if (count($this->languages)){
            $data = User::whereHas('languagesRanks', function(Builder $query) {
                $query->whereIn('language_name', $this->languages);
            })->paginate($this->usersPerPage);
        }

        return view('livewire.dashboard.hr', [
            'users' => $data,
            'languagesDatas' => DevLangagesEnum::values(),
        ]);
    }
}
