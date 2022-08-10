<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    public function platform() {
        return $this->belongsTo('App\Platform', 'platform_id');
    }

    public function director() {
        return $this->belongsTo('App\Director', 'director_id');
    }

    public function actors() {
        return $this->belongsToMany('App\Actor', 'performs');
    }

    public function audioLanguages() {
        return $this->belongsToMany('App\Language', 'audio_langs');
    }

    public function subtitlesLanguages() {
        return $this->belongsToMany('App\Language', 'subtitles_langs');
    }
}
