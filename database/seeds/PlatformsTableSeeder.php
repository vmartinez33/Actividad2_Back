<?php

use App\Platform;
use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Netflix', 'HBO MAX', 'Disney+', 'Amazon Prime Video', 'Movistar+', 'FILMIN', 'Sky TV', 'ATRESplayer'];

        for($i=0; $i<count($names); $i++) {
            $newPlatform = new Platform();
            $newPlatform->name = $names[$i];
            $newPlatform->save();
        }
    }
}
