<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'gender' => $faker->gender,
        'age' => $faker->age,
        'addresss' => $faker->address,
        'injury' => $faker->sentence,
    ];
});
