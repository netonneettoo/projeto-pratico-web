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
    return [
        'title' => $faker->name,
        'publication_year' => rand(2000, 2015),
        'edition' => $edition[array_rand($edition)],
        'price' => 102.15,
        'isbn' => $faker->isbn13,
        'publisher_id' => 1,
        'work_type_id' => 2,
        'status' => $status[array_rand($status)],
    ];
});

/*

function convertToObject($array) {
	$object = new stdClass();
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			$value = convertToObject($value);
		}
		$object->$key = $value;
	}
	return $object;
}

$clasa = array(
	convertToObject(array('id' => 1, 'name' => 'Andrei')),
	convertToObject(array('id' => 2, 'name' => 'Ionel')),
	convertToObject(array('id' => 3, 'name' => 'Alice')),
	convertToObject(array('id' => 4, 'name' => 'Bogdan')),
	convertToObject(array('id' => 5, 'name' => 'Mihai'))
);

print_r($clasa[array_rand($clasa)]);

 */