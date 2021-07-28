<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use App\Models\Parametre;
use App\Pct\Traits\DialogManager;

//use function PHPUnit\Framework\isNull;

class ShowParametre extends Component
{

   

    public $parametre_id;
    public $valeur;
    protected $rules =['id'=>'required|string',
                        'valeur'=>'required|string'];

    public function render()
    {
        return view('livewire.crud.show-parametre',
        ['parametres'=>Parametre::orderBy('id')->paginate(10)]);
    }
    public function resetData(){

    }
    public function initializeData()
    {
        //$this->dren = new Dren();
    }

    public function delete ($id){

        $parametre = Parametre::where('id',$id)->first();
        if(isset($parametre))
        {
            $parametre->delete();
        }

        session()->flash('message','Paramètre supprimer avec succès');
    }
    public function edit($id){
        $parametre=Parametre::findOrFail($id);
        $this->parametre_id=$parametre->id;
        $this->valeur=$parametre->valeur;
        $this->openModal();


    }
    public function store(){
        $this->validate();
        Parametre::updateOrCreate(
            ['id'=>$this->parametre_id,
            'valeur'=>$this->valeur]
        );
        session()->flash('message','Paramètre enregistré avec succès');
    }

}
