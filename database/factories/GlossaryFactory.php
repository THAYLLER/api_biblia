<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Glossary::class, function (Faker $faker) {
    return [

        'words_br' => $faker->words_br,
        'words_es' => $faker->words_es,
        'description_br' => $faker->description_br,
        'description_es' => $faker->description_es,
    ];
});
