<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->enum('sexo',['M','F'])->default('M');
            $table->string('cargo_desempenhado',100);
            $table->double('salario',8,2)->default(0)->nullable();
            $table->boolean('situacao');
            $table->string('password');
            $table->rememberToken();
            
            $table->unsignedBigInteger('endereco_id');
            $table->foreign('endereco_id')
                  ->references('id')
                  ->on('enderecos');
            
            $table->unsignedBigInteger('filial_id');
            $table->foreign('filial_id')
                  ->references('id')
                  ->on('filials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
