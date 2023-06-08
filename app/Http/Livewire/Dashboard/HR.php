<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Hr extends Component
{
    public function render()
    {

        $users = \App\Models\User::paginate(10);


        return view('livewire.dashboard.hr', [
            'users' => $users
        ]);
    }
}
