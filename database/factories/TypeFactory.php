<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;

$factory->define(Type::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    return [
        'value' => $faker->randomLetter,
        'description' => $faker->sentence(random_int(1, 5))
    ];
});
