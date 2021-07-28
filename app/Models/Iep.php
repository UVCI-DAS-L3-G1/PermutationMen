<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iep extends Model
{

    protected $table = 'ieps';
    public $timestamps = false;
    protected $fillable = array('dren_id', 'nom');

}
