<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $table = 'schoolyear';
    // Primary Key
    public $primaryKey ='syID';
    // Timestamps
    public $timestamps = true;


    public function report(){
        return $this->hasMany('App\Report');
    }

}
