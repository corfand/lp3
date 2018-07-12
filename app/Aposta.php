<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aposta extends Model{
    //    
    protected $table = 'aposta';

    //campos que podem ser preenchidos, 
    //oposto de guarded, onde são passados os campos que não podem ser preenchidos
    protected $fillable = ['selecao_casa_nome', 'selecao_fora_nome', 'user_id', 'aposta_casa_placar', 'aposta_fora_placar'];

    
   
}
