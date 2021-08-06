<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\User;
use App\Pct\AppConfig;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCompteUtilisateur extends Component
{

    use WithPagination;
    private  $comptes=[];
    
    public function anyItems(){
        return count($this->comptes)>0;
    }
    public function edit($id,$type)
    {
        $user = User::find($id);
        if(!is_null($user)){
            $user->user_type=$type;
            $user->save();
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        if(!is_null($user)){
            $user->delete();
        }
    }
    public function mount(){
        $this->refresh();
    }
    public function refresh(){

        $agents = Agent::pluck('id')->all();
         array_push($agents,Auth::user()->id);
         $this->comptes = User::query()->whereNotIn('id',$agents)->paginate(AppConfig::pagination());

    }


    public function render()
    {
        $this->refresh();
        return view('livewire.show-compte-utilisateur',['comptes'=>$this->comptes]);
    }
}
