<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'excerpt'=> $faker->text(100),
        'published_at'=> $faker->dateTimeBetween('-90 days', '+30 days'),
    ];
});
