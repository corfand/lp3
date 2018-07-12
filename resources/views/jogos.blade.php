@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row jogos">    
        <h2 class="titulos center">Jogos</h2>  

        <div class="panel panel-default">
            <div class="panel-body">
                
                  <div class="collapse navbar-collapse" id="ordenar">
                        <ul class="nav navbar-nav">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a  href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Ordenar por <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a>Mais Recentes</a></li>
                                        <li><a>Mais Antigos</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </ul>
                    </div>

                @foreach($jogos as $jogo) 
                
                @if($jogo['jogo_status'] != 'SCHEDULED')  
                    
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
                                        {{date('d/m H:i', strtotime($jogo['jogo_data_hora']))}}
                                    </span>
                                
                                    @if($jogo['jogo_status'] != 'TIMED')
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