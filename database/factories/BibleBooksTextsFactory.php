<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\BibleBooksTexts::class, function (Faker $faker) {
    return [

        'bible_books_id' => 'factory:App\Bible_books',
        'chapter' => $faker->chapter,
        'verse' => $faker->verse,
        'text_br' => $faker->text_br,
        'text_es' => $faker->text_es
    ];
});
