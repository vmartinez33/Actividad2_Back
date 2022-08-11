<?php

use App\Director;
use Illuminate\Database\Seeder;

class DirectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Quentin', 'Christopher', 'George', 'Jeremy', 'Matt'];
        $firstSurnames = ['Jerome', 'Edward', 'Vincent', 'Podeswa', 'Ross'];
        $secondSurnames = ['Tarantino', 'Nolan', 'Gilligan', 'Thomas', 'Duffer'];
        $dnis = ['22268061J', '02386781W', '16859538D', '34139400V', '29357839H'];
        $birthDates = ['27/03/1969', '30/07/1970', '10/02/1967', '01/01/1962', '15/02/1984'];
        $nationalities = ['Estadounidense', 'Britanica', 'Estadounidense', 'Canadiense', 'Estadounidense'];

        for($i=0; $i<count($names); $i++) {
            $newDirector = new Director();
            $newDirector->name = $names[$i];
            $newDirector->first_surname = $firstSurnames[$i];
            $newDirector->second_surname = $secondSurnames[$i];
            $newDirector->dni = $dnis[$i];
            $newDirector->birth_date = date('Y-m-d', strtotime($birthDates[$i]));
            $newDirector->nationality = $nationalities[$i];
            $newDirector->save();
        }
    }
}
