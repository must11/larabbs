<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $sententce=$faker->sentence();
    $updated_at=$faker->dateTimeThisMonth();
    $created_at=$faker->dateTimeThisMonth($updated_at);


    return [
        // 'name' => $faker->name,
        'title'=>$sententce,
        'body'=>$faker->text(),
        'excerpt'=>$sententce,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at,
    ];
});
