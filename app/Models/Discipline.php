<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model 
{

    protected $table = 'disciplines';
    public $timestamps = false;
    protected $fillable = array('nom');

}