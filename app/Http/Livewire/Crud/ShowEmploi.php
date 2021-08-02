<?php

namespace App\Http\Livewire\Crud;

use App\Models\Emploi;
use App\Http\Livewire\Crud\CrudComponent;
use Livewire\WithPagination;

class ShowEmploi extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';


    public ?Emploi $emploi;
    public  $manyEmplois=[];
    protected array $rules =['emploi.nom'=>'required|string'];

    public function resetData()
    {
        $this->emploi=new Emploi();
    }

    public function save()
    {
        $this->emploi->save();
    }
    public function saveMany()
    {

    }

    public function loadData($id)
    {
        $this->emploi = $this->getData($id);
    }

    public function getData($id){
        return  Emploi::findOrFail($id);
    }

    public function resetManyData(){


    }


    public function mount(){
        $this->emploi??$this->emploi=new Emploi();

    }
    public function render()
    {
        return view('livewire.crud.show-emploi',['emplois'=>Emploi::paginate(50)]);
    }
}

