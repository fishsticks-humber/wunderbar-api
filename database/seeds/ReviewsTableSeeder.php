<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Review::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            \App\Review::create([
                'user_id' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
                'restaurant_id' => $faker->randomElement(\App\Restaurant::all()->pluck('google_places_id')->toArray()),
                'review_text' => $faker->paragraph,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
