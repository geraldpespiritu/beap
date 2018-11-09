<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vattendance extends Model
{
    protected $table = 'vattendance';
    // Primary Key
    public $primaryKey ='ID';
    // Timestamps
    public $timestamps = true;


    public function vidinfo(){
        return $this->belongsTo('App\Vidinfo','idno');
    }

}
