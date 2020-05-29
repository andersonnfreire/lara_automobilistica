<?php

use App\Model\Automovel;
use App\Model\Endereco;
use App\Model\Filial;
use App\Model\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Filial::class,10)->create();

        $faker = Faker::create();

        User::create([
            'nome' => "Anderson Nascimento",
            'cpf' => "710.399.890-63",
            'data_nascimento' => DateTime::createFromFormat("d/m/Y", "27/01/1995"),
            'sexo'  => "M",
            'password' => Hash::make('123456'),
            'cargo_desempenhado' => "Tecnico em Informatica",
            'salario' => "9954.50",
            'situacao' => 1,
            'endereco_id' => factory(Endereco::class)->create()->id,
            'filial_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        factory(Automovel::class,10)->create();
    }
}
