<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;

$factory->define(Question::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    return [
        'label' => $faker->sentence . '?',
    ];
});
