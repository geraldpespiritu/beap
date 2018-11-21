<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Table Name
    protected $table = 'reports';
    // Primary Key
    public $primaryKey ='reportID';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function schoolyear(){
        return $this->belongsTo('App\SchoolYear');
    }
}
