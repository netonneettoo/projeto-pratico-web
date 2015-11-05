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
        'email' => $faker->email,
        'password' => bcrypt('default')
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    $status = array('active', 'inactive');
    return [
        'name' => $faker->name,
        'status' => $status[array_rand($status)],
    ];
});

$factory->define(App\WorkType::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->word,
    ];
});

$factory->define(App\Publisher::class, function (Faker\Generator $faker) {
    $status = array('active', 'inactive');
    return [
        'name' => $faker->name,
        'status' => $status[array_rand($status)],
    ];
});