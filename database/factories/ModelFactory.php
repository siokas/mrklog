<?php

use App\Models\Post as Post;

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

$factory->define(Post::class, function (Faker\Generator $faker) {
    $tag1 = $faker->word;
    $tag2 = $faker->word;
    return [
        'title' => $faker->sentence,
        'article' => $faker->paragraph,
        'author' => $faker->name,
        'pin' => str_random(5),
        'tags' => $tag1 . ',' . $tag2,
    ];
});
