<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{

    protected $table = 'ecoles';
    public $timestamps = false;
    protected $fillable = array('iep_id', 'nom');

}
