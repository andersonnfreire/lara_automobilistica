<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cep');
            $table->string('logradouro',100);
            $table->integer('numero')->nullable();
            $table->string('complemento',100)->nullable();
            $table->string('bairro',100);
            $table->string('cidade',100);
            $table->string('uf',2);
            $table->string('pais',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
