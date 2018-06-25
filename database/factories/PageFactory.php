<?php

use Faker\Generator as Faker;

$factory->define(App\Page::class, function (Faker $faker) {

    $title = [
        'fr' => $faker->name,
        'en' => $faker->name
    ];

    return [
        'title' => $title,
        'slug' => [
            'fr' => $faker->slug,
            'en' => $faker->slug
        ],
        'view' => $faker->slug,
        'sections' => [
            '0' => [
                'id' => 'title',
                'name' => [
                    'fr' => 'Titre',
                    'en' => 'Title'
                ],
                'content' => $title,
                'type' => 'text'
            ]
        ],
        'seo' => [
            'title' => $title,
            'description' => $title
        ]
    ];
});
