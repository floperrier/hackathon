<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Reward;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Rewards extends Component
{

    public function showReward($rewardId)
    {
        $reward = Reward::find($rewardId);
        $this->emit('showRewardModal', $reward);
    }

    public function claimReward($rewardId)
    {
        $reward = Reward::find($rewardId);
        $user = Auth::user();
        if ($user->reputation >= $reward->required_score) {
            $user->rewards()->attach($reward->id);
            $this->emit('rewardClaimed');
        }
        else {
            $this->emit('rewardClaimedError');
        }
    }

    public function render()
    {
        $user = Auth::user();
        $rewards = Reward::where('required_score', '<=', $user->reputation)->get()->sortBy('required_score');
        foreach ($user->rewards as $reward) {
            $rewards = $rewards->where('required_score', '!=', $reward->required_score);
        }

        return view('livewire.dashboard.rewards', [
            'rewards' => $rewards,
        ]);
    }
}
