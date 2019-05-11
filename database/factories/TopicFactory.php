<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
