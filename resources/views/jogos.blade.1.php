@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row jogos">    
        <h2 class="titulos center">Jogos</h2>  

        <div class="panel panel-default">
            <div class="panel-body">

                @foreach($jogos['fixtures'] as $jogo) 
                
                @if($jogo['status'] != 'SCHEDULED')   
                    <div class="col-md-12 bgApostaJogo">  
                        <form class="aposta">                                          
                            <div class="row">
                                <div class="col-md-4 center">
                                    <span class="jogosTitulos">                                        
                                        {{strtr($jogo['homeTeamName'],$traducao)}}                                    
                                    </span>
                                </div>

                                <div class="col-md-4 jogoTimed center">
                                    <span> 
                                        {{date('d/m H:i', strtotime($jogo['date']))}}
                                    </span>
                                </div>

                                <div class="col-md-4 center">
                                    <span class="jogosTitulos" name ="selecao_fora_nome">                                    
                                        {{strtr($jogo['awayTeamName'],$traducao)}}                                        
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 center">
                                    <div class="{{strtr($jogo['homeTeamName'],$flag)}}"></div>
                                </div>

                                <div class="col-md-4 center placar">
                                    @if($jogo['status'] != 'TIMED')
                                        {{$jogo['result']['goalsHomeTeam']}} x {{$jogo['result']['goalsAwayTeam']}}
                                    @else
                                        <span class="jogoTimed"> Não iniciou </span>
                                    @endif
                                </div>

                                <div class="col-md-4 center">
                                <div class="{{strtr($jogo['awayTeamName'],$flag)}}"></div>
                                </div>
                            </div>
                        </form>
                    </div>     

                @endif
                @endforeach
            </div>
        </div>        
    </div>
</div>

@include('layouts.footer')

@endsection 