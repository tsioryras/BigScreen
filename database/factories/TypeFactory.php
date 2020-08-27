<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'value'=>$faker->randomLetter,
        'description'=>$faker->paragraph(1)
    ];
});
