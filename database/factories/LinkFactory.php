<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'value' => Hash::make($faker->url)
    ];
});
