<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Automovel;
use Faker\Generator as Faker;

$factory->define(Automovel::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'ano' => $faker->year('now'),
        'cor' => 'amarelo',
        'modelo' => 'amarelo',
        'numero_chassi' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'categoria' => $faker->randomElement(array (
                                                    'entrada','hatch pequeno','hatch médio',
                                                    'sedã médio','sedã grande','SUV','pick-ups'            
                                                )),
        'filial_id' => 1,
    ];
});
