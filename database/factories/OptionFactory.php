<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Option;
use Faker\Generator as Faker;
use App\Models\Question;

// $table->unsignedBigInteger('question_id');
// $table->string('title');
// $table->boolean('is_correct')->default(false);

$factory->define(Option::class, function (Faker $faker) {
    return [
        'question_id' => Question::inRandomOrder()->firstOrFail(),
        'title' => $faker->sentence(),
    ];
});
