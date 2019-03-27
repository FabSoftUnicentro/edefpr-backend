<?php

use App\Models\Process;
use App\Models\Assisted;
use App\Models\CounterPart;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

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

$factory->define(Process::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create(),
        'counter_part_id' => DB::table('counterpart')->exists() ? DB::table('counterpart')->inRandomOrder()->first()->id : factory(CounterPart::class)->create(),
    ];
});
