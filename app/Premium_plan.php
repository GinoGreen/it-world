<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium_plan extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
