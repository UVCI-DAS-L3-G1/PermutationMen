<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use Illuminate\Database\QueryException;

abstract class CrudComponent extends Component
{

    const DUPLICATE_QUERY_CODE = '23000';
    public $isModalOpen = 0;
    public $dialogTitle;
    public $mainTitle;
    public $saved = 0;
    public function openModal()
    {
        $this->isModalOpen = true;
        $this->saved = false;

    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetData();

    }



    public function create()
    {
        $this->dialogTitle = "Création";
        $this->resetData();
        $this->openModal();
    }

    public function store()
    {
        $this->apply();
        $this->closeModal();
    }
    public function apply()
    {
       /* try {
            $this->validate();
            $this->save();
            session()->flash('message', 'Enregistré avec succès');
            $this->resetData();
            //$this->closeModal();
            $this->saved = true;
        } catch (QueryException $e) {

            if ($e->getCode() === CrudComponent::DUPLICATE_QUERY_CODE) {
                session()->flash('errors', 'Doublon détecté');
            }
        }
        */
         
            $this->validate();
            $this->save();
            session()->flash('message', 'Enregistré avec succès');
            $this->resetData();
            //$this->closeModal();
            $this->saved = true;

    }

    public function edit($id)
    {
        $this->dialogTitle = "Edition";
        $this->loadData($id);
        $this->openModal();
    }


    public function delete($id)
    {

        $model = $this->getData($id);
        if (!is_null($model)) {
            $model->delete();
        }
    }

    abstract public function getData($id);
    abstract public function loadData($id);
    abstract public function resetData();
    abstract public function save();
}
