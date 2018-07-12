<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Aposta;
use App\User;
use Illuminate\Support\Facades\Auth;

class ApostasController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    } 

    public function index(){        
        $jogos = app('App\Http\Controllers\JogosController')->getJogos('jogos');
        $traducao = app('App\Http\Controllers\JogosController')->getJogos('traducao');
        $flag = app('App\Http\Controllers\JogosController')->getJogos('flag');        
        $apostas = Aposta::where('user_id', Auth::id())->get(); 

        $jogosAMostrar = [];
       
        foreach( $jogos as $jogo ) {
            $achou = false;
            foreach($apostas as $aposta) {
                $achou = ($aposta['selecao_casa_nome'] == $jogo['selecao_casa_nome']) && ($aposta['selecao_fora_nome'] == $jogo['selecao_fora_nome']);       
            }
            if( !$achou ) $jogosAMostrar[] = $jogo;
        }

        return view('apostas', compact('jogosAMostrar', 'apostas', 'traducao', 'flag'));
    }   

    public function apostar(){
        Aposta::create([
            'selecao_casa_nome' => request('selecao_casa_nome'),
            'selecao_fora_nome' => request('selecao_fora_nome'),
            'aposta_casa_placar' => request('apostaTime1'),
            'aposta_fora_placar' => request('apostaTime2'),
            'user_id' => Auth::id()
        ]);

        //redireciona para página de apostas
        return redirect('/apostas');
    }

    public function calculaPontos($jogos, $apostas){
        foreach($jogos as $jogo) {
            foreach($apostas as $aposta) {
                
                if(($aposta['selecao_casa_nome'] == $jogo['selecao_casa_nome']) && ($aposta['selecao_fora_nome'] == $jogo['selecao_fora_nome'])){
                    $pontos = 0;

                    // comparação para verificar se o usuário acertou o placar
                    if( ($jogo['jogo_casa_placar'] == $aposta['aposta_casa_placar']) && ($jogo['jogo_fora_placar'] == $aposta['aposta_fora_placar'])){
                        //3 pontos
                        $pontos += 3;
                    }

                    // comparação para verificar se o usuário acertou o time vencedor
                    if($jogo['jogo_casa_placar'] > $jogo['jogo_fora_placar']) {
                        if($aposta['aposta_casa_placar'] > $aposta['aposta_fora_placar']){
                            //3 pontos
                            $pontos += 3;
                        }
                    }else{
                        if($aposta['aposta_fora_placar'] > $aposta['aposta_casa_placar']){
                            //3 pontos
                            $pontos += 3;
                        }
                    }
                    
                    
                    $apostaPontos = Aposta::find($aposta['id']);

                    $apostaPontos->aposta_pontos = $pontos;

                    $apostaPontos->save();
                }
            }
        }
    }

    public function pontos(){
        $jogos = app('App\Http\Controllers\JogosController')->getJogos('jogos');
        
        $apostas = Aposta::get();        
        $rankings = [];
        
        // Ranking::create([
        //     'ranking_pontos_total' => $pontosTotal, 
        //     'ranking_user_name' => User::find($aposta->user_id)->name
        // ]);
        
        $this->calculaPontos($jogos, $apostas);

        foreach($apostas as $aposta) {
            $pontosTotal = Aposta::where('user_id', $aposta->user_id)->sum('aposta_pontos'); //sum das apostas de cada usuario;
            $rankings[$aposta->user_id]['pontos'] = $pontosTotal;
            $rankings[$aposta->user_id]['name'] = User::find($aposta->user_id)->name;                   
        }
    
        return view('pontos', compact('apostas', 'rankings'));   
    }

    public function show(){
        $jogos = app('App\Http\Controllers\JogosController')->getJogos('jogos');
        $apostas = Aposta::where('user_id', Auth::id())->get();  
        
        $this->calculaPontos($jogos, $apostas);

        $apostas = Aposta::where('user_id', Auth::id())->get();          
        $traducao = app('App\Http\Controllers\JogosController')->getJogos('traducao');
        $flag = app('App\Http\Controllers\JogosController')->getJogos('flag');
        
        return view('minhasapostas', compact('apostas', 'traducao', 'flag'));   
    }
}
