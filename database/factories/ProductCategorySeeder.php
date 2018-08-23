<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
    $nameFr = $faker->name;
    return [
        'name' => [
            'en' => $faker->name,
            'fr' => $nameFr
        ],
        'description' => [
            'en' => null,
            'fr' => null
        ],
        'parent_id' => $faker->numberBetween(2, 4)
    ];
});