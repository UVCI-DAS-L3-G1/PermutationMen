<?php
namespace App\Pct\Traits;
trait DialogManager
{

    public $isModalOpen=0;
    public $isMultipleItemModalOpen=0;
    public $itemNumber=1;
    public $title;

    public function openModal(){
        $this->isModalOpen=true;
    }
    public function closeModal(){
        $this->isModalOpen=false;
    }
    public function openManyItemModal(){
        $this->isMultipleItemModalOpen=true;
    }
    public function closeManyItemModal(){
        $this->isMultipleItemModalOpen=false;
    }

    public function create(){
        $this->resetData();
        $this->openModal();
    }
    public function createMany(){
        $this->resetManyData();
        $this->openManyItemModal();
    }
    public function store()
    {
        $this->validate();
        $this->save();

        session()->flash('message','Enregistré avec succès');
        $this->closeModal();
        $this->resetData();
    }
    public function edit($id){
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
    abstract public function resetManyData();
    abstract public function save();
}
