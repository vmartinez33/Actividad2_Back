<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $dates = ['birth_date'];

    public function series() {
        return $this->belongsToMany('App\Serie', 'performs');
    }
}
