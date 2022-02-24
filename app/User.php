<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'region', 'avatar_path', 'cv_path', 'level', 'surename'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills(){
        return $this->belongsToMany('App\Skill');
    }

    public function premium_plans(){
        return $this->belongsToMany('App\Premium_plan');
    }  
    
    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function job_roles() {
        return $this->belongsToMany('App\Job_role');
    }
}
