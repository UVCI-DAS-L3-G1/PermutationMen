<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Discipline;
use App\Models\Dren;
use App\Models\Ecole;
use App\Models\Emploi;
use App\Models\Fonction;
use App\Models\Iep;
use App\Pct\PctHelper;
use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class RegisterAgent extends Component
{
    //public $ecole_id;
    public $iep_id;
    private $ieps = [];
    private $ecoles = [];
    public $dren_id;
    private $drens = [];
    //public $fonction_id;
    private $fonctions = [];
    //public $emploi_id;
    private $emplois = [];
    //public $discipline_id;
    private $disciplines = [];


    public ?Agent $agent;
    public function store()
    {
        $this->validate();
        $this->agent->save();
        redirect('dashboard');
    }

    protected function rules()
    {
        return [
            'agent.matricule' => 'required|string|unique:agents,matricule,' . $this->agent->id,
            'agent.fonction_id' => 'required|integer',
            'agent.emploi_id' => 'required|integer',
            'agent.discipline_id' => 'required|integer',
            'agent.ecole_id' => 'required|integer',
            'agent.id' => 'required|integer'
        ];
    }
    public function mount()
    {
        if (PctHelper::currentIsRegistrationCompleted()) {
            redirect('dashboard');
        }
        $agent = PctHelper::getCurentAgent();
        if(is_null($agent)){
            $agent=new Agent();
            $agent->id=Auth::user()->id;
        }
        $this->agent = $agent;
        $this->refreshData();
    }
    public function canSave()
    {
        return $this->agent->ecole_id > 0 &&
            $this->agent->fonction_id > 0 &&
            $this->agent->emploi_id > 0 &&
            $this->agent->discipline_id > 0 &&
            !empty($this->agent->matricule);
    }
    public function refreshData()
    {


        $this->emplois = Emploi::orderBy('nom')->get();
        $this->fonctions = Fonction::orderBy('nom')->get();
        $this->disciplines = Discipline::orderBy('nom')->get();

        $this->drens = Dren::orderBy('nom')->get();
        if($this->agent?->ecole_id>0){
            $this->dren_id = $this->agent?->ecole?->iep?->dren_id;
        }

        if (!empty($this->dren_id)) {
            $this->ieps = Iep::where('dren_id', $this->dren_id)->orderBy('nom')->get();

            if($this->agent?->ecole_id>0){
                $this->iep_id = $this->agent->ecole?->iep_id;
            }


            if (!empty($this->iep_id)) {
                $this->ecoles = Ecole::where('iep_id', $this->iep_id)->orderBy('nom')->with('iep.dren')->paginate(5);
            }
        }
    }
    public function render()
    {
        $this->refreshData();
        return view('livewire.register-agent',
            [
                'ieps' => $this->ieps,
                'drens' => $this->drens,
                'emplois' => $this->emplois,
                'fonctions' => $this->fonctions,
                'disciplines' => $this->disciplines,
                'ecoles' => $this->ecoles,

            ]
        );
    }
}
