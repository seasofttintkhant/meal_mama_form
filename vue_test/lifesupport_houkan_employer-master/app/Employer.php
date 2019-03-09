<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use Notifiable;

    protected $dateFormat = 'U';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function facilities()
    {
        return $this->hasMany('App\Facility');
    }

    public function jobs()
    {
        return $this->hasManyThrough('App\Job','App\Facility');
    }

    public function isActive()
    {
        return $this->active == 1;
    }
}
