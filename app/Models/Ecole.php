<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{

    protected $table = 'ecoles';
    public $timestamps = false;
    protected $fillable = array('iep_id', 'nom');

    public function iep(){
        return $this->belongsTo(Iep::class);
    }
    public function avisPermutations(){
        return $this->hasMany(AvisPermutation::class,'ecole_destination_id');
    }
    public function agents(){
        return $this->hasMany(Agent::class);
    }

}
