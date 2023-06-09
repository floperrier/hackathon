<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.user-profile');
    }
}
