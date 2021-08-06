<?php

namespace App\Http\Livewire\Crud;

use App\Models\Fonction;
use App\Http\Livewire\Crud\CrudComponent;
use Livewire\WithPagination;

class ShowFonction extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';


    public ?Fonction $fonction;
    public  $manyFonctions=[];
    protected array $rules =['fonction.nom'=>'required|string'];

    public function resetData()
    {
        $this->fonction=new Fonction();
    }

    public function save()
    {
        $this->fonction->save();
    }
    public function saveMany()
    {

    }

    public function loadData($id)
    {
        $this->fonction = $this->getData($id);
    }

    public function getData($id){
        return  Fonction::findOrFail($id);
    }

    protected function rules()
    {
        return ['fonction.nom'=>'required|string|unique:fonctions,nom,'.$this->fonction->id];
    }


    public function mount(){
        $this->fonction??$this->fonction=new Fonction();

    }
    public function render()
    {
        return view('livewire.crud.show-fonction',['fonctions'=>Fonction::paginate(50)]);
    }
}
