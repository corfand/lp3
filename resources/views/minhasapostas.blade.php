@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row apostas">    
        <h2 class="titulos center">Minhas Apostas</h2>  

        <div class="panel panel-default">
            <div class="panel-body">

            @foreach($apostas as $aposta) 
                
                <div class="col-md-12 bgApostaJogo">  
                    <form class="aposta" action = "/apostar" method = "POST">   
                    {{csrf_field()}}                     
                        <div class="row">
                            <div class="col-md-4 center">
                                <span class="jogosTitulos col-md-12 center">
                                    {{strtr($aposta['selecao_casa_nome'], $traducao)}}
                                </span>
                                
                                <div class="{{strtr($aposta['selecao_casa_nome'], $flag)}}"></div>
                                </div>

                            <div class="col-md-4 center">
                                <div class="col-md-12 center placar">                            
                                    <span>{{$aposta['aposta_casa_placar']}}</span> x <span>{{$aposta['aposta_fora_placar']}}</span>
                                </div>

                                <div class="mapostasPontos center">
                                    @if($aposta['aposta_pontos'] === null)
                                        Pontos: Ainda não calculados
                                    @else
                                        Pontos: {{$aposta['aposta_pontos']}}
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 center">
                                <span class="col-md-12 center jogosTitulos">
                                    {{strtr($aposta['selecao_fora_nome'], $traducao)}}                           
                                </span>
                                
                                <div class="{{strtr($aposta['selecao_fora_nome'],$flag)}}"></div>
                            </div>
                        </div>
                    </form>
                </div>

            @endforeach                     
            </div>     
        </div>       
    </div>
</div>

@include('layouts.footer')

@endsection 
