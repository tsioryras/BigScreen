<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Choice;

$factory->define(Choice::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    $options = [];
    for ($i = 0; $i < random_int(2, 7); $i++) {
        $options[] = $faker->sentence(random_int(1, 4));
    }
    return [
        'label' => $faker->word,
        'content' => $faker->randomElement([null, [1, 2, 3, 4, 5], $options])
    ];
});
