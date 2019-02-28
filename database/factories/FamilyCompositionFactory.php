<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB as DB;
use App\Models\FamilyComposition;

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

$factory->define(FamilyComposition::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->date(),
        'situation' => 'teste',
        'kinship' => 'grandmother',
        'work' => 'batateiro',
        'income' => $faker->randomFloat(),
        'assited_id' => DB::table('assisteds')->exists() ? DB::table('assisteds')->inRandomOrder()->first()->id : factory(Assisted::class)->create()
    ];
});
