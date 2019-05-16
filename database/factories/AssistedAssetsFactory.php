<?php

use App\Models\AssistedAssets;
use Illuminate\Support\Facades\DB as DB;
use Faker\Generator as Faker;
use App\Models\Assisted;

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

$factory->define(AssistedAssets::class, function (Faker $faker) {
    return [
        'assets' => 'house',
        'assets_price' => $faker->randomFloat(2, 1, 10),
        'status' => 'paid',
        'instalment_price' => $faker->randomFloat(2, 1, 10),
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create()
    ];
});
