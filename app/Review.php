<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['name', 'email', 'message', 'type'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
