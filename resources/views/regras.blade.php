@extends('layouts.app')

@section('content')

<div class="bghome">

    <div class="content">

        <h2 class="titulos center">Regras</h2>  

         <div class="panel panel-default regras">       
            <!-- <div class="panel-heading center">Regras</div>  -->

            <div class="panel-body"> 
                         
                <!-- <img src="regras.svg" class="img-fluid" alt="Responsive image"> -->
                <div class="row bgRegras">
                   
                    <div class="col-md-10 col-md-offset-1 descRegras">
                        <p>A pontuação será calculada da seguinte forma: </p> 
                        <ul>
                            <li>Você ganhará 3 pontos se acertar o time vencedor.</li>
                            <li>Caso acerte o placar exato, ganhará mais 3 pontos.</li>
                        </ul>    
                        <p> E caso haja empate, o prêmio será dividido entre os vencedores.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection 