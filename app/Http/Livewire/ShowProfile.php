<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use Livewire\Component;

class ShowProfile extends Component
{
    public ?Agent $agent;
    
    public function mount($id)
    {
        $this->agent = Agent::with('user','ecole')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.show-profile');
    }
}
