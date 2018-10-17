<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calamity extends Model
{
    // Table Name
    protected $table = 'calamities';
    // Primary Key
    public $primaryKey ='calamityID';
    // Timestamps
    public $timestamps = true;

  /*  protected $fillable = [
        'name', 'description', 'image', 'priority', 'api_token',
    ];

    protected $hidden = [
        'api_token',
    ];*/

    public function user(){
        return $this->belongsTo('App\User');
    }
}
