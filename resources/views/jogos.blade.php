@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row jogos">    
        <h2 class="titulos center">Jogos</h2>  

        <div class="panel panel-default">
            <div class="panel-body">

                @foreach($jogos as $jogo) 
                
                @if($jogo['status'] != 'SCHEDULED')   
                    <div class="col-md-12 bgApostaJogo">  
                        <form class="aposta">                                          
                            <div class="row">
                                <div class="col-md-4 center">
                                    <span class="jogosTitulos col-md-12 center">                               
                                        {{strtr($jogo['selecao_casa_nome'],$traducao)}}                                    
                                    </span>
                                    <div class="{{strtr($jogo['selecao_casa_nome'],$flag)}}"></div>
                                </div>
                                
                                <div class="col-md-4 center">
                                <!-- <div class="col-md-12 center jogoTimed"> -->
                                    <span class="center jogoTimed"> 
                                        {{date('d/m H:i', strtotime($jogo['date']))}}
                                    </span>
                                
                                    @if($jogo['status'] != 'TIMED')
                                        <span id="placar" class="col-md-12 center placar">
                                            {{$jogo['jogo_casa_placar']}} x {{$jogo['jogo_fora_placar']}}
                                        </span>
                                    @else
                                        <span class="jogoTimed col-md-12 center"> Não iniciou </span>
                                    @endif
                                </div>

                                <div class="col-md-4 center">
                                    <span class="col-md-12 center jogosTitulos">
                                        {{strtr($jogo['selecao_fora_nome'],$traducao)}}                                        
                                    </span>
                                    <div class="{{strtr($jogo['selecao_fora_nome'],$flag)}}"></div>
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