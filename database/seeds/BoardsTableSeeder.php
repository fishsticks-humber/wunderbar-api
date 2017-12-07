<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    public function run()
    {
        \App\Board::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            \App\Board::create([
                'name' => $faker->company,
                'user_id' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
            ]);
        }
    }
}
