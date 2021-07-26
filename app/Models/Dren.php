<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Dren extends Model 
{

    protected $table = 'drens';
    public $timestamps = false;
    protected $fillable = array('nom');

}