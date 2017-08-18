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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'code' => uniqid(),
        'cost' => rand(100,500),
        'description' => $faker->text(200),
        'profit_margin' => rand(40,70)
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'business_name' => $faker->word,
        'shipping' => $faker->word,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'street' => $faker->streetName,
        'number' => rand(100,2000),
        'zip_code' => $faker->postcode,
        'localidad_id' => 1,
        'provincia_id' => 1
    ];
});

$factory->define(App\Purchase::class, function (Faker\Generator $faker) {
    return [
        'total' => rand(1000,5000),
        'cost' => rand(1000,5000),
        'state_id' => 1
    ];
});

$factory->define(\App\Stock::class, function (Faker\Generator $faker) {
    return [
        'product_id' => rand(1,10),
        'size_id' => rand(1,5),
        'color_id' => rand(1,5),
        'amount' => rand(10,50),
    ];
});
