<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Choice;


$factory->define(Choice::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    $numeric = [1, 2, 3, 4, 5];
    $none = null;
    $free = [];
    for ($i = 0; $i < rand(2, 7); $i++) {
        $free[] = $faker->sentence(rand(1, 5));
    }
    return [
        "type" => $faker->sentence(random_int(1, 6)),
        "content" => $faker->randomElement([$none, $numeric, $free])
    ];
});
