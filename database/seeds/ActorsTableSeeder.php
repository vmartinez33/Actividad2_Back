<?php

use App\Actor;
use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Bryan', 'Aaron', 'Dana', 'Emilia', 'Cillian', 'Brad'];
        $firstSurnames = ['Lee', 'Paul', 'Ashbrook', 'Rose', 'Murphy', 'Pitt'];
        $secondSurnames = ['Cranston', 'Sturtevant', 'Lee', 'Clarke', 'Lee', ''];
        $dnis = ['59025620F', '42830200Z', '20577598G', '98274258L', '73193317A', '24549377V'];
        $birthDates = ['07/03/1956', '27/08/1979', '24/05/1967', '23/10/1986', '25/05/1976', '18/12/1963'];
        $nationalities = ['Estadounidense', 'Estadounidense', 'Estadounidense', 'Britanica', 'Irlandes', 'Estadounidense'];

        for($i=0; $i<count($names); $i++) {
            $newActor = new Actor();
            $newActor->name = $names[$i];
            $newActor->first_surname = $firstSurnames[$i];
            $newActor->second_surname = $secondSurnames[$i];
            $newActor->dni = $dnis[$i];
            $newActor->birth_date = date('Y-m-d', strtotime($birthDates[$i]));
            $newActor->nationality = $nationalities[$i];
            $newActor->save();
        }
    }
}
