<?php

namespace App\Http\Livewire\Dashboard;

use App\Enums\DevLangagesEnum;
use App\Models\LanguageRank;
use Livewire\Component;
use Livewire\WithPagination;

class Skills extends Component
{
    use WithPagination;

    public $search = '';

    public $experiencesFilter = [];

    public $levelSort = null;
    public $languageSort = null;

    protected $queryString = [
        'experiencesFilter' => ['except' => ''],
    ];

    public function render()
    {
        $languagesRanks = LanguageRank::where('user_id', auth()->user()->id);

        if ($this->experiencesFilter) {
            $languagesRanks->whereIn('years_of_experience', $this->experiencesFilter);
        }
        if ($this->levelSort) {
            $languagesRanks = $languagesRanks->orderBy('rank', $this->levelSort);
        }
        if ($this->languageSort) {
            $languagesRanks = $languagesRanks->orderBy('language_name', $this->languageSort);
        }
        return view('livewire.dashboard.skills', [
            'languagesRanks' => $languagesRanks->paginate(10),
        ]);
    }

    public function getRankProgressBarClass($rank)
    {
        return (($rank - (-8)) / 16) * 100;
    }
}
