<?php

use App\Models\Assisted;
use App\Models\FamilyMember;
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

$factory->define(FamilyMember::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->date(),
        'legal_situation' => 'general',
        'kinship' => 'grandmother',
        'work' => 'test',
        'income' => $faker->randomFloat(2, 1, 10),
        'assisted_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create()
    ];
});
