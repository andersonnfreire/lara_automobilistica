<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Endereco;
use App\Model\Filial;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Filial::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'ie'   => $faker->unique()->numberBetween(1,10),
        'cnpj' => Str::random(10),
        'endereco_id' => factory(Endereco::class)
    ];
});
