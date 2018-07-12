<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApostaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aposta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('selecao_casa_nome');
            $table->string('selecao_fora_nome');
            $table->integer('user_id');
            $table->integer('aposta_casa_placar')->unsigned();
            $table->integer('aposta_fora_placar')->unsigned();
            $table->integer('aposta_pontos')->unsigned()->nullable();
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
        Schema::dropIfExists('aposta');
    }
}
