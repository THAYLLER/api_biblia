<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\BibleBooks::class, function (Faker $faker) {
    return [

        'name_br' => is_string($faker->name_br),
        'name_es' => is_string($faker->name_es),
    ];
});
