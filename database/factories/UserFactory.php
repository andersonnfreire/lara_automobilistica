<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Endereco;
use App\Model\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => Str::random(10),
        'data_nascimento' => $faker->date('Y-m-d', 'now'),
        'sexo'  => $faker->randomElement(array ('M','F')),
        'password' => Hash::make('123456'),
        'cargo_desempenhado' => Str::random(10),
        'salario' => $faker->numberBetween(2,8),
        'situacao' => $faker->boolean(),
        'endereco_id' => factory(Endereco::class)->create()->id,
        'filial_id' => 1,
        'remember_token' => Str::random(10),
    ];
});
