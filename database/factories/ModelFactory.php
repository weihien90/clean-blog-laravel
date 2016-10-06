<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(5);
    $slug = str_slug($title);
    $date = date_format( $faker->dateTimeThisYear($max = 'now'), 'Y-m-d H:i:s');
    return [
        'title' => $title,
        'slug' => $slug,
        'category' => "Test",
        'cover_image' => "https://placehold.it/1900x872",
        'content' => implode( "\n\n", $faker->paragraphs(20) ),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
