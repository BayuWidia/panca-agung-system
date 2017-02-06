<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'level', 'url_foto', 'activated'
    ];


    public function slider()
    {
      return $this->hasMany('App\Models\Slider');
    }
}
