@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">    
        <h2 class="titulos center">Pontuação</h2> 

        <div class="panel panel-default pontos">   
                            
            <div class="panel-heading pontosTitulos"> 
                <div class="row col-md-12">
                    <div class="col-md-6 center">
                        <span class="nomeUsuario">Usuário</span>
                    </div>
                    <div class="col-md-6 center">
                        <span class="Pontos">Pontos</span>
                    </div>
                </div>   
            </div>

            <div class="panel-body">            
                <div class="box">
                    <div class="box-body"> 
                        
                    @foreach($rankings as $ranking)
                        <div class="row col-md-12">
                            <div class="col-md-6 center">
                                <span class="nomeUsuario">{{$ranking['name']}}</span>
                            </div>
                            
                            <div class="col-md-6 center">
                                <span class="Pontos">{{$ranking['pontos']}}</span>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

@include('layouts.footer')

@endsection 