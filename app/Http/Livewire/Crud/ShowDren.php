<?php

namespace App\Http\Livewire\Crud;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Dren;
use App\Http\Livewire\Crud\CrudComponent;
use Livewire\WithPagination;
class ShowDren extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    const MAIN_TILTE="Liste des Direction Régionales";
    public ?Dren $dren;
    public  $manyDrens=[];
    protected array $rules =['dren.nom'=>'required|string|unique:drens'];
    
    public function resetData()
    {

        $this->dren=new Dren();
    }

    public function save()
    {
        $this->dren->save();
    }


    public function loadData($id)
    {
        $this->dren = $this->getData($id);
    }

    public function getData($id){
        return  Dren::findOrFail($id);
    }




    public function mount(){
        $this->dren??$this->dren=new Dren();
        $this->mainTitle=ShowDren::MAIN_TILTE;

    }
    public function render()
    {

        return view('livewire.crud.show-dren',['drens'=>Dren::paginate(50)]);
    }
}
