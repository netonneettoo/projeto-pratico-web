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

$factory->define(App\Work::class, function (Faker\Generator $faker) {
    $edition = array('First edition', 'Second edition', 'Third edition', 'Fourth edition', 'Fifth edition', 'Sixth edition', 'Seventh edition', 'Eighth edition', 'Ninth edition', 'Tenth edition');
    $status = array('active', 'inactive');
    $publishers = \App\Publisher::getByStatus(\App\Publisher::STATUS_ACTIVE)->get()->toArray();
    $workTypes = \App\WorkType::all()->toArray();
    return [
        'title' => $faker->name,
        'publication_year' => rand(2000, 2015),
        'edition' => $edition[array_rand($edition)],
        'price' => 102.15,
        'isbn' => $faker->isbn13,
        'publisher_id' => $publishers[array_rand($publishers)]['id'],
        'work_type_id' => $workTypes[array_rand($workTypes)]['id'],
        'status' => $status[array_rand($status)],
    ];
});