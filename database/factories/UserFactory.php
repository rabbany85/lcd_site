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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address_line1' => $faker->address,
        'postcode' => $faker->word,
        'user_type' => 'Client',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function(Faker $faker){
    return[
    	'title' => $faker->word,
    	'price' => $faker->numberBetween($min = 1000, $max = 9000),
    	'description' => $faker->text,
    	'category_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});


$factory->define(App\Media::class, function(Faker $faker){
	return [
        'model_name' => 'product',
        'url' => $faker->imageUrl($width = 640, $height = 480),
        'model_id' => $faker->numberBetween($min = 1, $max = 100),
	];
});


