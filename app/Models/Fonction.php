<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{

    protected $table = 'fonctions';
    public $timestamps = false;
    protected $fillable = array('nom');

    public function agents(){
        return $this->hasMany(Agent::class);
    }

}
