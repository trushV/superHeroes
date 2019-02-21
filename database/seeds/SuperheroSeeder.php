<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class SuperheroSeeder
 */
class SuperheroSeeder extends Seeder
{

    /**
     * @throws Exception
     */
    public function run()
    {
        $date = new DateTime('now');
        $faker = Faker::create('App\Models\SuperheroModel\Superhero');
        for ($i = 1; $i <= 50; $i ++){
            DB::table('superhero')->insert([
                'nickname' => ucfirst($faker->word),
                'real_name' =>ucfirst($faker->word),
                'origin_description' => $faker->text,
                'superpowers' => $faker->sentence,
                'catch_phrase' => $faker->sentence,
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
