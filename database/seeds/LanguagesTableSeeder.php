<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Español', 'Inglés', 'Francés', 'Alemán', 'Portugés', 'Italiano', 'Japonés', 'Catalán'];
        $isoCodes = ['es-ESP', 'en-ENG', 'fr-FRA', 'de-DEU', 'pt-PTR', 'it-ITA', 'ja-JPN', 'ca-CAT'];

        for($i=0; $i<count($names); $i++) {
            $newLanguage = new Language();
            $newLanguage->name = $names[$i];
            $newLanguage->iso_code = $isoCodes[$i];
            $newLanguage->save();
        }
    }
}
