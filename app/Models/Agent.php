<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    protected $table = 'agents';
    public $timestamps = false;
    protected $fillable = array('ecole_id', 'fonction_id', 'emploi_id', 'discipline_id', 'matricule');

    public function user(){
        return $this->hasOne(User::class,'id','id');
    }
    public function ecole(){
        return $this->belongsTo(Ecole::class);
    }
    public function fonction(){
        return $this->belongsTo(Fonction::class);
    }
    public function emploi(){
        return $this->belongsTo(Emploi::class);
    }
    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }

    public function publications(){
        return $this->hasMany(AvisPermutation::class,'agent_demandeur_id');
    }
    public function reservation(){
        return $this->hasOne(AvisPermutation::class,'agent_interesse_id');
    }

}
