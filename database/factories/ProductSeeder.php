<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
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
        'options' => [
            'color' => [
                'red' => ['label' => ['en' => 'Red', 'fr' => 'Rouge'], 'price_impact' => 2],
                'black' => ['label' => ['en' => 'Black', 'fr' => 'Noir'], 'price_impact' => 0],
                'white' => ['label' => ['en' => 'White', 'fr' => 'Blanc'], 'price_impact' => 3],
            ],
        ],
        'price' => $faker->randomFloat(2, 4, 100),
        'category_id' => $faker->numberBetween(1, 44)
    ];
});
