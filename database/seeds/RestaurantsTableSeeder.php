<?php


use App\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Restaurant::create([
                'google_places_id' => $faker->sha256,
                'yelp_id' => $faker->sha256,
            ]);
        }
    }

}