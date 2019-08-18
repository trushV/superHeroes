<?php

namespace database\seeds;

use DateTime;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

/**
 * Class ImageSeeder
 */
class ImageSeeder extends Seeder
{

    /**
     * @throws \Exception
     */
    public function run()
    {
        $date = new DateTime('now');
        $faker = Faker::create('App\Models\SuperheroModel\Superhero');
        for ($i = 1; $i <= 50; $i ++){
            DB::table('images')->insert([
                'superhero_id' => $faker->numberBetween(1,50),
                'path' =>'images/'.$faker->numberBetween(1,10).'.jpg',
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
