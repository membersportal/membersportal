<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'company_id' => $faker->numberBetween($min = 1, $max = 9),
        'title' => $faker->words(6, true),
        'desc' => $faker->sentence(1000),
        'from_date' => $faker->date($format = 'Y-m-d', $max = 'to_date'),
        'to_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'invite_only' => $faker->boolean,
        'rsvp_required' => $faker->boolean,
        'url' => $faker->url,
    ];
});