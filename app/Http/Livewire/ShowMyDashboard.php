<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowMyDashboard extends Component
{
    

    public function render()
    {

        return view('livewire.show-my-dashboard');
    }
}
