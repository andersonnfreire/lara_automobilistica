<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Endereco;
use Faker\Generator as Faker;

$factory->define(Endereco::class, function (Faker $faker) {
    return [
        'cep' =>$faker->numberBetween(01001000,99999999),
        'logradouro' => 'aa',
        'numero' => '11',
        'complemento' => '1aaa',
        'cidade' => $faker->city,
        'bairro' => $faker->state,
        'uf' => 'ab',
    ];
});
