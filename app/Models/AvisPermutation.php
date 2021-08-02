<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisPermutation extends Model
{

    protected $table = 'avis_permutations';
    public $timestamps = false;
    protected $fillable = array('agent_demandeur_id', 'ecole_destination_id', 'date_publication', 'agent_interesse_id', 'date_reservation');

}
