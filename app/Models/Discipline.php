<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{

    protected $table = 'disciplines';
    public $timestamps = false;
    protected $fillable = array('nom');
    
    public function agents(){
        return $this->hasMany(Agent::class);
    }

}
