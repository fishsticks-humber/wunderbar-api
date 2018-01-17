<?php
use Faker\Generator as Faker;

$factory->define(App\Restaurant::class, function (Faker $faker) {
    return [
        'google_places_id' => $faker->sha256,
        'yelp_id' => $faker->sha256,
    ];
});