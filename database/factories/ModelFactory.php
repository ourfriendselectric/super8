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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => $faker->e164PhoneNumber,
        'artist' => $faker->name,
        'location' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Upload::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'filename' => $faker->shuffle('abcdefghijklmnopqrstuvwkyz1234567890'),
    ];
});

$factory->define(App\Discount::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->word,
        'amount' => $faker->numberBetween(10, 30),
    ];
});
