@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row apostas">    
        <h2 class="titulos center">Apostas</h2>  

        <div class="panel panel-default">
            <div class="panel-body">

            @foreach($jogosAMostrar as $jogo) 
                @if($jogo['status'] === 'TIMED')  
                <div class="col-md-12 bgApostaJogo">  
                    <form class="aposta" action = "/apostar" method = "POST">   
                    {{csrf_field()}}                     
                        <div class="row">
                            <div class="col-md-4 center">
                                <span class="jogosTitulos col-md-12 center">     
                                    <input type="hidden" name ="selecao_casa_nome" value="{{$jogo['homeTeamName']}}" /> 
                                                             
                                        {{strtr($jogo['homeTeamName'],$traducao)}}       
                                </span>

                                <div class="{{strtr($jogo['homeTeamName'],$flag)}}"></div>
                            </div>

                            <div class="col-md-4 center">    
                                <div class="col-md-12 center">                        
                                    <input class="apostaPlacar" name ="apostaTime1" type="number"> x <input class="apostaPlacar" name="apostaTime2" type="number">
                                </div>
                                
                                <button type="submit" class="center apostarBotao btn btn-default">Apostar</button>
                            </div>

                        <div class="col-md-4 center">
                                <span class="col-md-12 center jogosTitulos">
                                    <input type="hidden" name ="selecao_fora_nome" value="{{$jogo['awayTeamName']}}">
                                        {{strtr($jogo['awayTeamName'],$traducao)}}                                        
                                    </input>      
                                </span>
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