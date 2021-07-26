<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model 
{

    protected $table = 'agents';
    public $timestamps = false;
    protected $fillable = array('ecole_id', 'fonction_id', 'emploi_id', 'discipline_id', 'matricule');

}