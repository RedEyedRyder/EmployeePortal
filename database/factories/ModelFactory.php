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

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'id_number' => $faker->numerify($string = '#############'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\LeaveApplication::class, function (Faker\Generator $faker) {
	$date = Carbon::create(2016, 5, 28, 0, 0, 0);
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'status' => $faker->numberBetween(0, 2),
        'leave_type_id' => $faker->numberBetween(0, 2),
        'days' => $faker->randomDigitNotNull,
        'starts_date' => $date->format('Y-m-d H:i:s'),
        'return_date' => $date->addDays(rand(1, 10))->format('Y-m-d H:i:s')
    ];
});