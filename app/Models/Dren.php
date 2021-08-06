<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dren extends Model
{

    protected $table = 'drens';
    public $timestamps = false;
    protected $fillable = array('nom');
    public function ieps(){
        return $this->hasMany(Iep::class);
    }

}
