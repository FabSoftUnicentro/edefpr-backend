<?php

use App\Models\Assisted;
use App\Models\CounterPart;
use App\Models\Process;
use App\Models\User;
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

$factory->define(Process::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'title' => $faker->jobTitle,
        'user_id' => DB::table('users')->exists() ? DB::table('users')->inRandomOrder()->first()->id : factory(User::class)->create(),
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create(),
        'counter_part_id' => DB::table('counter_parts')->exists() ? DB::table('counter_parts')->inRandomOrder()->first()->id : factory(CounterPart::class)->create()
    ];
});
