<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'slug_url' => $faker->slug,
        'title' => $faker->sentence,
	    'description' => $faker->paragraph(1),
	    'content' => $faker->paragraph(4),
	    'photo' => $faker->image,
	    'flag_publish' => rand(0,1),
	    'author' => $faker->firstName,
	    'id_created' => 1,
	    'version' => 1,
    ];
});
