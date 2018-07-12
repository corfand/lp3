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
        // $aposta = Aposta::where('aposta_casa_placar', null)->get();
        return view('apostas', compact('jogos', 'traducao', 'flag'));
    }   

    public function apostar(){
        
        //Cria a aposta de acordo com o input e salva no banco
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pontos(){
        $jogos = app('App\Http\Controllers\JogosController')->getJogos('jogos');
        
        $apostas = Aposta::get();        
        $ranking = [];

        foreach($jogos['fixtures'] as $jogo) {
            foreach($apostas as $aposta) {
                
                if(($aposta['selecao_casa_nome'] == $jogo['homeTeamName']) && ($aposta['selecao_fora_nome'] == $jogo['awayTeamName'])){
                    $pontos = 0;

                    // comparação para verificar se o usuário acertou o placar
                    if( ($jogo['result']['goalsHomeTeam'] == $aposta['aposta_casa_placar']) && ($jogo['result']['goalsAwayTeam'] == $aposta['aposta_fora_placar'])){
                        //3 pontos
                        $pontos += 3;
                    }

                    // comparação para verificar se o usuário acertou o time vencedor
                    if($jogo['result']['goalsHomeTeam'] > $jogo['result']['goalsAwayTeam']) {
                        if($aposta['aposta_casa_placar'] > $aposta['aposta_fora_placar']){
                            //3 pontos
                            $pontos += 3;
                        }
                    }else{
                        if($aposta['aposta_fora_placar'] > $aposta['aposta_fora_placar']){
                            //3 pontos
                            $pontos += 3;
                        }
                    }
                    
                    $ranking[$aposta->user_id]['pontos'] = $pontos;
                    $ranking[$aposta->user_id]['name'] = User::find($aposta->user_id)->name;                   

                    // $apostaId = 'aposta_id';
                    // $apostaPontos = Aposta::where('aposta_id', $aposta['aposta_id'])->first();

                    $apostaPontos = Aposta::find($aposta['id']);

                    $apostaPontos->aposta_pontos = $pontos;

                    $apostaPontos->save();

                    // Aposta::create(['aposta_pontos' => $pontos]);
                }
            }
        }
                        
        return $pontos;   

    }

    public function show(){
        $apostas = Aposta::where('user_id', Auth::id())->get();          
        $traducao = app('App\Http\Controllers\JogosController')->getJogos('traducao');
        $flag = app('App\Http\Controllers\JogosController')->getJogos('flag');
        $pontos = pontos();

        return view('minhasapostas', compact('apostas', 'traducao', 'flag', 'pontos'));   
    }
}
