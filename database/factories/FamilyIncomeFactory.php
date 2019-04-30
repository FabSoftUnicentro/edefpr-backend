<?php

use App\Models\Assisted;
use App\Models\FamilyIncome;
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

$factory->define(FamilyIncome::class, function (Faker $faker) {
    return [
        'family_income' => $faker->randomFloat(2),
        'social_programs' => $faker->randomFloat(2),
        'social_security_contribution' => $faker->randomFloat(2),
        'income_tax' => $faker->randomFloat(2),
        'alimony' => $faker->randomFloat(2),
        'extraordinary_expenses' => $faker->randomFloat(2),
        'net_family_income' => $faker->randomFloat(2),
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create()
    ];
});
