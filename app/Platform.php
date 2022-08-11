<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public function series() {
        return $this->hasMany('App\Serie');
    }
}
