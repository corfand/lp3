<?php

namespace App\Http\Controllers;
use App\Jogo;
use Illuminate\Http\Request;

class JogosController extends Controller
{  
    public function __construct(){
        $this->middleware('auth');
    } 

    public function initialize(){
        //Setando a TimeZone do Brasil, para mostrar a hora corretamente.
        date_default_timezone_set('Brazil/East');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->initialize();
        $qntd = 0;

        $jogos = $this->getJogos('jogos'); // jogos Banco
        $traducao = $this->getJogos('traducao');
        $flag = $this->getJogos('flag');      

        foreach($jogos as $jogo){
            $qntd++;
        }
        
        $dataHoraAtual = date("d/m/Y H:i");

      
        if($qntd > 0){
            foreach($jogos as $jogo){
                $dataBanco = date("d/m/Y H:i", strtotime($jogo['jogo_data_hora']));
         
                if($jogo['jogo_status'] == 'TIMED'){
                    if($dataBanco < $dataHoraAtual){
                        //UPDATE
                    }
                }
            }
        }else{
           $this->inserirJogos();
        }


        return view('jogos', compact('jogos', 'traducao', 'flag'));
    }

    public function inserirJogos(){
        $jogos = $this->getJogos('jogosAPI');

        foreach($jogos['fixtures'] as $jogo){
            Jogo::create([
                'selecao_casa_nome' => $jogo['homeTeamName'], 
                'selecao_fora_nome' => $jogo['awayTeamName'], 
                'jogo_casa_placar' => $jogo['result']['goalsHomeTeam'], 
                'jogo_fora_placar' => $jogo['result']['goalsAwayTeam'], 
                'jogo_data_hora' => $jogo['date'],
                'jogo_status' => $jogo['status']
            ]);
        }
        
        return redirect('/jogos');
    }

    public function updateJogos(){
        $jogos = $this->getJogos('jogosAPI');

        if (($jogo['result']['goalsHomeTeam'] != null) || ($jogo['result']['goalsAwayTeam'] != null)){
            $jogoBanco = Jogo::find($jogoBanco['id']);
            $jogoBanco->selecao_casa_nome = $jogo['homeTeamName'];
            $jogoBanco->selecao_fora_nome = $jogo['awayTeamName']; 
            $jogoBanco->jogo_casa_placar = $jogo['result']['goalsHomeTeam'];
            $jogoBanco->jogo_fora_placar = $jogo['result']['goalsAwayTeam'];
            
            $jogoBanco->save();
        }

        return redirect('/jogos');
    }

    public function getJogos($what){
        // Jogos API
        $uri = 'http://api.football-data.org/v1/competitions/467/fixtures';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = array(env('API_FOOTBALL_KEY'));
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);

        $jogosAPI = json_decode($response, true);

        //Jogos Banco
        $jogos = Jogo::get();        

        //FromTo para traduzir o nome das seleções para o português
        $traducao = array('Brazil' => 'Brasil',
            'Australia' => 'Austrália',
            'Belgium' => 'Bélgica',
            'Colombia' => 'Colômbia',
            'Croatia' => 'Croácia',
            'Denmark' => 'Dinamarca',
            'Egypt' => 'Egito',
            'England' => 'Inglaterra',
            'Spain' => 'Espanha',
            'France' => 'França',
            'Germany' => 'Alemanha',
            'Iran' => 'Irã',
            'Iceland' => 'Islândia',
            'Japan' => 'Japão',
            'Korea Republic' => 'Coreia do Sul',
            'Saudi Arabia' => 'Arábia Saudita',
            'Morocco' => 'Marrocos',
            'Mexico' => 'México',
            'Nigeria' => 'Nigéria',
            'Panama' => 'Panamá',
            'Poland' => 'Polônia',
            'Russia' => 'Rússia',
            'Serbia' => 'Sérvia',
            'Switzerland' => 'Suíça',
            'Sweden' => 'Suécia',
            'Tunisia' => 'Tunísia',
            'Uruguay' => 'Uruguai');
        //Nome da classe que contém a bandeira de cada país para ser passado na view
        $flag = array('Brazil' => 'flag bra',
            'Australia' => 'flag aus',
            'Belgium' => 'flag bel',
            'Croatia' => 'flag cro',
            'Denmark' => 'flag den',
            'Egypt' => 'flag egy',
            'England' => 'flag eng',
            'Spain' => 'flag esp',
            'France' => 'flag fra',
            'Germany' => 'flag ger',
            'Iran' => 'flag irn',
            'Iceland' => 'flag isl',
            'Japan' => 'flag jpn',            
            'Morocco' => 'flag mar',
            'Mexico' => 'flag mex',
            'Nigeria' => 'flag nga',
            'Panama' => 'flag pan',
            'Poland' => 'flag pol',
            'Russia' => 'flag rus',
            'Serbia' => 'flag srb',
            'Switzerland' => 'flag sui',
            'Sweden' => 'flag swe',
            'Tunisia' => 'flag tun',
            'Uruguay' => 'flag uru',
            'Portugal' => 'flag por',
            'Argentina' => 'flag arg',
            'Peru' => 'flag per',
            'Costa Rica' => 'flag crc',
            'Colombia' => 'flag col',
            'Senegal' => 'flag sen',
            'Korea Republic' => 'flag kor',
            'Saudi Arabia' => 'flag ksa'); 
            // dd($jogos);
        return $$what;
    }
}
