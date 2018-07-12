<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('selecao_casa_nome');
            $table->string('selecao_fora_nome');
            $table->integer('jogo_casa_placar')->unsigned()->nullable();
            $table->integer('jogo_fora_placar')->unsigned()->nullable();
            $table->string('jogo_data_hora');
            $table->string('jogo_status');
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
        Schema::dropIfExists('jogo');
    }
}
