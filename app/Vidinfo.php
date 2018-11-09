<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vidinfo extends Model
{
    protected $table = 'vidinfo';
    // Primary Key
    public $primaryKey ='idno';
    // Timestamps
    public $timestamps = true;

    public $incrementing = false;

    public function vattendance(){
        return $this->hasMany('App\Vattendance','idno');
    }
}
