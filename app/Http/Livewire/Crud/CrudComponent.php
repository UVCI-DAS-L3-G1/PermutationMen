<?php
namespace App\Http\Livewire\Crud;
use Livewire\Component;

abstract class CrudComponent extends Component
{


    public $isModalOpen=0;
    public $dialogTitle;
    public $mainTitle;
    public $saved=0;
    public function openModal(){
        $this->isModalOpen=true;
    }
    public function closeModal(){
        $this->isModalOpen=false;
        $this->resetData();
    }



    public function create(){
        $this->dialogTitle="Création";
        $this->resetData();
        $this->openModal();
    }

    public function store()
    {
        $this->validate();
        $this->save();
        $this->on=true;
        session()->flash('message','Enregistré avec succès');
        $this->resetData();
        $this->closeModal();
    }

    public function edit($id){
        $this->dialogTitle="Edition";
        $this->loadData($id);
        $this->openModal();
    }


    public function delete($id){

        $model = $this->getData($id);
        if(!is_null($model))
        {
            $model->delete();
        }

    }
    abstract public function getData($id);
    abstract public function loadData($id);
    abstract public function resetData();
    abstract public function save();

}
