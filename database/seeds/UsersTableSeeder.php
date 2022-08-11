<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Victor', 'Jona'];
        $emails = ['victor@test.com', 'jona@test.com'];
        $passwords = [Hash::make('12341234'), Hash::make('11111111')];

        for($i=0; $i<count($names); $i++) {
            $newUser = new User();
            $newUser->name = $names[$i];
            $newUser->email = $emails[$i];
            $newUser->password = $passwords[$i];
            $newUser->save();
        }
        
    }
}
