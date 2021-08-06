<?php

namespace App\Http\Livewire\Crud;

use App\Models\Discipline;
use App\Http\Livewire\Crud\CrudComponent;
use Livewire\WithPagination;

class ShowDiscipline extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';


    public ?Discipline $discipline;
    public  $manyDisciplines=[];
    protected array $rules =['discipline.nom'=>'required|string'];

    public function resetData()
    {
        $this->discipline=new Discipline();
    }

    public function save()
    {
        $this->discipline->save();
    }
    public function saveMany()
    {

    }

    public function loadData($id)
    {
        $this->discipline = $this->getData($id);
    }

    public function getData($id){
        return  Discipline::findOrFail($id);
    }

    protected function rules()
    {
        return ['discipline.nom'=>'required|string|unique:disciplines,nom,'.$this->discipline->id];
    }


    public function mount(){
        $this->discipline??$this->discipline=new Discipline();

    }
    public function render()
    {

        return view('livewire.crud.show-discipline',['disciplines'=>Discipline::paginate(50)]);
    }
}

