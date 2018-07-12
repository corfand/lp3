<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: url("../img/bghome.png") repeat;
                font-weight: 100;
                margin: 0;
                font-family: Raleway,sans-serif;
                font-size: 14px;
                line-height: 1.6;
                color: #636b6f;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @font-face {
                font-family: 'FonteFifa'; /*a name to be used later*/
                src: url('../font/dusha-regular.woff.ttf'); /*URL to font*/
            }

            .tituloHeader{
                /*color: #0f4583 !important;*/
                font-family: 'FonteFifa';
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Entrar</a>
                    <a href="{{ url('/register') }}">Cadastrar</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md tituloHeader">
                    Bolão Copa do Mundo 2018
                </div>

                <div class="links">
                    <a href="{{ url('/jogos') }}">Jogos</a>
                    <a href="{{ url('/apostas') }}">Apostas</a>
                    <a href="{{ url('/pontuacao') }}">Pontuação</a>
                    <a href="http://trab.dc.unifil.br/gitlab/gabrielpraxedes/bolao-copa/">GitLab</a>
                </div>
            </div>
        </div>
    </body>
</html>
