<?php

use App\Model\Automovel;
use App\Model\Filial;
use App\Model\User;
use Illuminate\Database\Seeder;

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
        factory(User::class,10)->create();
        factory(Automovel::class,10)->create();
    }
}
