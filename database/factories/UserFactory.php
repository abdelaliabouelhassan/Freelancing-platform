<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(Str::random(10)), // password
        'remember_token' => Str::random(10),
        'city_id'=>$faker->numberBetween(1,50),
        'category_id'=>$faker->numberBetween(1,10),
        'is_active'=>$faker->boolean,
        'phone'=>$faker->phoneNumber,
        'gander'=>$faker->randomElement(['male', 'female']),
        'is_online'=>$faker->boolean
    ];
});

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7,11),
        'image_id'=>$faker->numberBetween(1,10),
        'body'=>$faker->paragraph(rand(10,15),true),
        'category_id'=>$faker->numberBetween(1,10),
        'city_id'=>$faker->numberBetween(1,50),
        'user_id'=>$faker->numberBetween(1,50),
        'type'=>$faker->randomElement(['job', 'servic']),
        'is_done'=>$faker->boolean,
    ];

});
$factory->define(\App\City::class, function (Faker $faker) {
    return [
        'city_name' => $faker->city,
    ];
});
$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->domainWord,
    ];

});

$factory->define(\App\Image::class, function (Faker $faker) {

    return [
        'path' =>$faker->image('public/images','100','100'),
    ];
});



