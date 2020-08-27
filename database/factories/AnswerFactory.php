<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;

$factory->define(Answer::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    return [
        'value' => $faker->sentence(random_int(1, 4))
    ];
});
