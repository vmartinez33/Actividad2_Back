<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlatformsTableSeeder::class);
        $this->call(DirectorsTableSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
    }
}
