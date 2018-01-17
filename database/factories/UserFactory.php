<?php
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'facebook_key' => $faker->sha256,
        'google_key' => $faker->sha256,
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'e-mail' => $faker->email,
        'password' => $faker->password,
        'uber_key' => $faker->sha256,
    ];
});