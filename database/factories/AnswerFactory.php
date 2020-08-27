<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;

$factory->define(Answer::class, function () {
    $faker = Faker\Factory::create('fr_FR');
    $content = [];
    for ($i = 0; $i < 19; $i++) {
        $content[(string)($i + 1)] = $faker->word;
    }
    return [
        'email' => $faker->safeEmail,
        'url' => $faker->url,
        'content' => $content
    ];
});
