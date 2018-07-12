<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    //    
    protected $table = 'jogo';

    //campos que podem ser preenchidos, 
    //oposto de guarded, onde são passados os campos que não podem ser preenchidos
    protected $fillable = ['selecao_casa_nome', 'selecao_fora_nome', 'jogo_casa_placar', 'jogo_fora_placar', 'jogo_data_hora', 'jogo_status'];

}
