<?php

namespace App\Http\Livewire\Dashboard;

use App\Enums\DevLangagesEnum;
use App\Enums\YearsExperienceEnum;
use App\Models\LanguageRank;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Leaderboard extends Component
{
    use WithPagination;

    public $search = '';

    public $languageFilter = '';

    public $scoreSort = null;
    public $languageSort = null;

    protected $queryString = [
        'languageFilter' => ['except' => ''],
    ];

    public function render()
    {
        $users = User::role('developer');

        if ($this->languageFilter) {
            $users->whereHas('languagesRanks', function ($query) {
                $query->where('language_name', $this->languageFilter);
            });
        }
        if ($this->scoreSort) {
            $users = $users->orderBy('reputation', $this->scoreSort);
        }
        if ($this->languageSort) {
            $users = $users->orderBy('reputation', $this->languageSort);
        }
        $usersByReputation = $users->orderBy('reputation', 'desc')->get();

        return view('livewire.dashboard.leaderboard', [
            'users' => $users->paginate(10),
            'usersByReputation' => $usersByReputation,
        ]);
    }

    public function getRankProgressBarClass($rank)
    {
        return (($rank - (-8)) / 16) * 100;
    }
}
