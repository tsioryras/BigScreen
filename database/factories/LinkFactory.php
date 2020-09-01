<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Link::class, function (Faker $faker) {
    $chars = ["/", ".", "\\", "*", ";", "`", "'", "\""];
    return [
        'value' => str_replace($chars, "", substr(Hash::make($faker->password(23, 25) . now()), 7, 23))];
});
