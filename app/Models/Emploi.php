<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{

    protected $table = 'emplois';
    public $timestamps = false;
    protected $fillable = array('nom');

}
