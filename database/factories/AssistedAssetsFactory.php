<?php

use App\Models\Asset;
use App\Models\Assisted;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB as DB;

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

$factory->define(Asset::class, function (Faker $faker) {
    return [
        'name' => 'house',
        'price' => $faker->randomFloat(2, 1, 10),
        'status' => 'paid',
        'installment_price' => $faker->randomFloat(2, 1, 10),
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create()
    ];
});
