<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'created_at' => $created_at,
        'updated_at' => $updated_at,
        'content' => $faker->sentence(),
    ];
});
