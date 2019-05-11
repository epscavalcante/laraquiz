<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Question;
use Faker\Generator as Faker;
use App\Models\Topic;

// $table->unsignedBigInteger('topic_id');
// $table->string('title');
// $table->text('subtitle')->nullable();
// $table->text('explanation')->nullable();

$factory->define(Question::class, function (Faker $faker) {
    return [
        'topic_id' => Topic::inRandomOrder()->firstOrFail(),
        'title' => $faker->text(150),
        'subtitle' => $faker->text(75),
        'explanation' => $faker->text(350)
    ];
});
