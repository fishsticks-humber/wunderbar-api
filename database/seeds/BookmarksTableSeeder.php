<?php

use Illuminate\Database\Seeder;

class BookmarksTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Bookmark::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            \App\Bookmark::create([
                'board_id' => $faker->randomElement(\App\Board::all()->pluck('id')->toArray()),
                'restaurant_id' => $faker->randomElement(\App\Restaurant::all()->pluck('google_places_id')->toArray())
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
