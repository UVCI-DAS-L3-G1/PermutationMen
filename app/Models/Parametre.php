<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{

    protected $primarykey='id';
    protected $keyType='string';
    protected $table = 'parametres';
    public $timestamps = false;
    protected $fillable = array('id', 'valeur');

}
