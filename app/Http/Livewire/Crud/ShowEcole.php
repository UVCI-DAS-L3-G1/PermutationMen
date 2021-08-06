<?php

namespace App\Http\Livewire\Crud;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Ecole;
use App\Http\Livewire\Crud\CrudComponent;
use App\Models\Dren;
use App\Models\Iep;
use Livewire\WithPagination;

class ShowEcole extends CrudComponent
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    const MAIN_TILTE = "Liste des écoles par IEP";
    public ?Ecole $ecole;
    private $ieps = [];
    private $ecoles = [];
    public $dren_id;
    public $iep_id;
    private $drens;
    public $nomIep;


    public function any()
    {
        if (isset($this->ecoles)) {
            return count($this->ecoles);
        }
        return 0;
    }
    public function resetData()
    {
        $this->ecole = new Ecole();
        //$this->resetErrorBag();
    }

    public function save()
    {
        $this->ecole->save();
    }


    public function loadData($id)
    {
        $this->ecole = $this->getData($id);
    }

    public function getData($id)
    {
        return  Ecole::with('iep.dren')->findOrFail($id);
    }

    protected function rules()
    {
        return [
            'ecole.nom' => 'required|string|unique:ecoles,nom,' . $this->ecole->id,
            'ecole.iep_id' => 'required|integer'
        ];
    }
    public function refreshData()
    {



        $this->drens = Dren::orderBy('nom')->get();
        if (!empty($this->dren_id)) {

            $this->ieps = Iep::where('dren_id', $this->dren_id)->orderBy('nom')->get();

            if (!empty($this->iep_id)) {
                $this->ecoles = Ecole::where('iep_id', $this->iep_id)->orderBy('nom')->with('iep.dren')->paginate(10);

                $iep = Iep::find($this->iep_id);
                $this->nomIep = $iep->nom;
                $this->ecole->iep_id = $this->iep_id;
                $this->ecole->iep = $iep;

            }

        }
    }

    public function mount()
    {
        if (empty($this->ecole)) {
            $this->resetData();
        }
        $this->mainTitle = ShowEcole::MAIN_TILTE;
        $this->refreshData();
    }
    public function render()
    {

        $this->refreshData();
        return view(
            'livewire.crud.show-ecole',
            ['ecoles' => $this->ecoles, 'ieps' => $this->ieps, 'drens' => $this->drens]
        );
    }
}
