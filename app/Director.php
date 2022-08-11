<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $dates = ['birth_date'];

    public function series() {
        return $this->hasMany('App\Serie');
    }
}
