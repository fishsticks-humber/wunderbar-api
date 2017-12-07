<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Photo::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            \App\Photo::create([
                'user_id' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
                'restaurant_id' => $faker->randomElement(\App\Restaurant::all()->pluck('google_places_id')->toArray()),
                'review_id' => $faker->randomElement(\App\Review::all()->pluck('id')->toArray()),
                'file'=>$faker->sha256,
                'isAvatar'=>$faker->boolean(20),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
