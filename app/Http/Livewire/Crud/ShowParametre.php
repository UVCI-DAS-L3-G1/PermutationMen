<?php

namespace App\Http\Livewire\Crud;

use App\Models\Parametre;
use App\Http\Livewire\Crud\CrudComponent;
use App\Pct\AppConfig;
use Livewire\WithPagination;

class ShowParametre extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';
    const MAIN_TITLE="Paramètres de l'application";



    public ?Parametre $parametre;
    protected array $rules =[];

    public function resetData()
    {
        $this->parametre=new Parametre();
    }

    public function save()
    {
        $this->parametre->save();
    }


    public function loadData($id)
    {
        $this->parametre = $this->getData($id);
    }

    public function getData($id){
        return  Parametre::findOrFail($id);
    }

    protected function rules()
    {
        return ['parametre.valeur'=>'required|string'];
    }


    public function mount(){
        $this->parametre??$this->parametre=new Parametre();
        $this->mainTitle=showParametre::MAIN_TITLE;

    }

    public function render()
    {

        AppConfig::annee();
        AppConfig::ministere();
        AppConfig::drh();
        AppConfig::adresse();
        AppConfig::telephone();
        AppConfig::pagination();
        AppConfig::auto_reservation();
        AppConfig::isOpened();

        return view('livewire.crud.show-parametre',['parametres'=>Parametre::orderBy('attribut')->paginate(50)]);
    }
}

