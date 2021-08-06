<?php

namespace App\Http\Livewire\Crud;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Iep;
use App\Http\Livewire\Crud\CrudComponent;
use App\Models\Dren;
use Livewire\WithPagination;

class ShowIep extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    const MAIN_TILTE = "Liste des Inspections de l'Enseignement Primaire";
    public ?Iep $iep;
    public $dren_id;
    private $drens;
    private $ieps=[];


    public function any(){
        if(isset($this->ieps)){
            return count($this->ieps);
        }
        return 0;

    }
    public function resetData()
    {

        $this->iep = new Iep();
        $dren = Dren::find($this->dren_id);
        if(empty($dren)){
            $dren = new Dren();
        }
        $this->iep->dren_id=$this->dren_id;
        $this->iep->dren=$dren;
    }

    public function save()
    {
        $this->iep->save();
    }


    public function loadData($id)
    {
        $this->iep = $this->getData($id);
    }

    public function getData($id)
    {
        return  Iep::with('dren')->findOrFail($id);
    }

    protected function rules()
    {
        return ['iep.nom' => 'required|string|unique:ieps,nom,' . $this->iep->id,
        'iep.dren_id' => 'required|integer'];
    }
    public function refreshData()
    {
        $this->drens = Dren::orderBy('nom')->get();
        $this->dren_id = $this->iep?->dren_id;
        if(!empty($this->dren_id)){
            $this->ieps = Iep::with('dren')->where('dren_id',$this->dren_id)->orderBy('nom')->with('dren')->paginate(5);
        }

    }

    public function mount()
    {
        if(empty($this->iep))
        {
            $this->resetData();
        }

        $this->iep->dren_id=$this->dren_id;
        $this->mainTitle = ShowIep::MAIN_TILTE;
        $this->refreshData();


    }
    public function render()
    {
        $this->refreshData();
        return view('livewire.crud.show-iep', ['ieps' => $this->ieps,'drens'=>$this->drens]);
    }
}
