<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function seriesAudio() {
        return $this->belongsToMany('App\Serie', 'audio_langs');
    }

    public function seriesSubtitles() {
        return $this->belongsToMany('App\Serie', 'subtitles_langs');
    }
}
