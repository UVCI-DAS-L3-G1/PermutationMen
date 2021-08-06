<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{


     
    protected $table = 'parametres';
    public $timestamps = false;
    protected $fillable = array('attribut', 'valeur');

}
