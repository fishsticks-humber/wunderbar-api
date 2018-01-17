<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'facebook_key' => $faker->sha256,
                'google_key' => $faker->sha256,
                'first_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'e-mail' => $faker->email,
                'password' => $faker->password,
                'uber_key' => $faker->sha256,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}