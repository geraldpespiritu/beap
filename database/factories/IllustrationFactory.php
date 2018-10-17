<?php

use Faker\Generator as Faker;

$factory->define(App\NewIllustration::class, function (Faker $faker) {
    return [
        'illName' => $faker->text(50),
        'illDesc' => $faker->text(200)
    ];
});
