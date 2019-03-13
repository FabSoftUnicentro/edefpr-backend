<?php

use App\Models\CounterPart;
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

$factory->define(CounterPart::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rg' => $faker->unique()->text(11),
        'rg_issuer' => 'SSP', // Pode ser removido no futuro
        'profession' => 'Teste',
        'note' => null,
        'remuneration' => 0.00,
        'phone_number' => $faker->numberBetween(99999999999),
        'cpf' => $faker->numberBetween(999999999),
        'uf' => 'PR',
        'city' => 1,
        'number' => '123',
        'street' => 'Teste',
        'postcode' => '85015310',
        'complement' => '',
        'neighborhood' => 'Batel',
    ];
});
