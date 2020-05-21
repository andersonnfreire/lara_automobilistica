<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',100);
            $table->integer('ano');
            $table->string('modelo',50);
            $table->string('cor',50);
            $table->integer('numero_chassi')->unique();
            $table->enum('categoria',[
                                    'entrada','hatch pequeno','hatch médio',
                                    'sedã médio','sedã grande','SUV','pick-ups'
                                    ]);
            
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
        Schema::dropIfExists('automovels');
    }
}
