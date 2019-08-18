<?php

use Illuminate\Database\Seeder;
use database\seeds\SuperheroSeeder;
use database\seeds\ImageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SuperheroSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
