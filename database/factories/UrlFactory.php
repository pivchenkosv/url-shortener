<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Url;
use Faker\Generator as Faker;

$factory->define(Url::class, function (Faker $faker) {
    return [
        'original_url' => $faker->url,
        'usage_quantity' => rand(0, 4)
    ];
});
