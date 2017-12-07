<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        \App\Board::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            \App\Board::create([
                'name' => $faker->company,
                'user_id' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
            ]);
        }
    }
}
