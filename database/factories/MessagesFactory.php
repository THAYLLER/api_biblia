<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Messages::class, function (Faker $faker) {
    return [

        'image' => $faker->image,
        'title_br' => $faker->title_br,
        'title_es' => $faker->title_es,
        'description_br' => $faker->description_br,
        'description_es' => $faker->description_es,
    ];
});
