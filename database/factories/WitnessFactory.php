<?php

use App\Models\Witness;
use App\Models\Assisted;
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

$factory->define(Witness::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cpf' => (string) $faker->numberBetween(999999999),
        'rg' => $faker->unique()->text(11),
        'rg_issuer' => 'SSP',
        'uf' => 'PR',
        'city' => 'Guarapuava',
        'number' => '123',
        'street' => 'Teste',
        'postcode' => '85015310',
        'complement' => '',
        'neighborhood' => 'Batel',
    ];
});
