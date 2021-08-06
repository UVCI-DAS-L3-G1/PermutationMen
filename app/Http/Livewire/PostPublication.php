<?php

namespace App\Http\Livewire;

use App\Models\Dren;
use App\Models\Ecole;
use App\Models\Iep;
use App\Pct\PctHelper;
use App\Pct\PublicationManager;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class PostPublication extends Component
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    const MAIN_TILTE = "Publier";

    public $dren_id;
    public $iep_id;
    private $drens = [];
    private $ieps = [];
    private $ecoles = [];


    public function any()
    {
        if (isset($this->ecoles)) {
            return count($this->ecoles);
        }
        return 0;
    }


    public function save($ecole_id)
    {
        $canPub =PctHelper::canPublish();
        if(!$canPub) return;
        $manager =new PublicationManager();
        $res = $manager->publier($ecole_id);
        session()->flash('flash.banner',$res?'Avis publié':'Avis non publié');
        session()->flash('flash.bannerStyle',$res?'success':'danger');
        $this->refreshData();
        //return redirect('/');
    }

    public function refreshData()
    {
        $agent=PctHelper::getCurentAgent();
        $this->drens = Dren::orderBy('nom')->get();
        if (!empty($this->dren_id)) {

            $this->ecoles =PctHelper::getEcolesDisponiblesDren($agent,$this->dren_id);

            $this->ieps = Iep::where('dren_id', $this->dren_id)->orderBy('nom')->get();

            if (!empty($this->iep_id)) {

                $this->ecoles=PctHelper::getEcolesDisponiblesIep($agent,$this->iep_id);
                //$this->ecoles = Ecole::where('iep_id', $this->iep_id)->orderBy('nom')->with('iep.dren')->paginate(10);
            }
        }
    }

    public function mount()
    {
        $this->refreshData();
    }
    public function render()
    {

        $this->refreshData();
        return view(
            'livewire.post-publication',
            ['ecoles' => $this->ecoles, 'ieps' => $this->ieps, 'drens' => $this->drens]
        );
    }
}
