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

$factory->define(App\Rfp::class, function (Faker\Generator $faker) {
    return [
        'company_id' => $faker->numberBetween($min = 1, $max = 9),
        'project_title' => $faker->words(4, true),
        'deadline' => $faker->dateTimeThisMonth($max = 'now'),
        'contact_name' => $faker->name,
        'contact_department' => $faker->words(2, true),
        'contact_no' => $faker->phoneNumber,
        'project_scope' => $faker->sentences(4, true),
        'contract_from_date' => $faker->dateTimeThisMonth($max = 'now'),
        'contract_to_date' => $faker->dateTimeThisMonth($max = 'now'),
    ];
});
