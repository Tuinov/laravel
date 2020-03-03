<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use Faker\Factory;
//use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Categories::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    //$name = $faker->sentence(2);
    $name = $faker->realText(rand(20,50));

    return [
        'name' => $name,
        'slug' => Str::slug($name)
    ];
});
