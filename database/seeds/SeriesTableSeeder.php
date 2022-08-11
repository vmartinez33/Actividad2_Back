<?php

use App\Serie;
use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Breaking Bad', 'Juego de tronos', 'Peaky Blinders', 'Twin Peaks', 'Stranger Things', 'Cobra Kai'];
        $platform_id  = [1, 4, 2, 5, 3, 6];
        $director_id  = [3, 4, 5, 2, 1, 6];
        $seriesActors = [[0=>1, 1=>2], [0=>4], [0=>5], [0=>3], [0=>6], [0=>2]];
        $seriesAudioLanguages =[[0=>1, 1=>2], [0=>1, 1=>2], [0=>3, 0=>4], [0=>1, 1=>5], [0=>1, 1=>5], [0=>1, 1=>5]];
        $seriesSubtitlesLanguages =[[0=>3, 1=>4], [0=>3, 1=>4], [0=>1, 1=>2], [0=>2, 1=>4], [0=>2, 1=>4], [0=>2, 1=>4]];

        for($i=0; $i<count($title); $i++) {
            $newSeries = new Serie();
            $newSeries->title = $title[$i];
            $newSeries->platform_id = $platform_id[$i];
            $newSeries->director_id = $director_id[$i];
            $newSeries->save();
            $newSeries->actors()->attach($seriesActors[$i]);
            $newSeries->audioLanguages()->attach($seriesAudioLanguages[$i]);
            $newSeries->subtitlesLanguages()->attach($seriesSubtitlesLanguages[$i]);
        }
    }
}