<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Auth
Auth::routes();

//Regras
Route::get('/', 'JogosController@index');
Route::get('/regras', 'RegrasController@index');

//Apostas
Route::get('/apostas', 'ApostasController@index');
Route::get('/minhasapostas', 'ApostasController@show');
Route::post('/apostar', 'ApostasController@apostar');

// Route::get('apostas/show/{user_id}', 'ApostasController@show');

//Jogos
Route::get('/jogos', 'JogosController@index');

//Pontos
Route::get('/pontos', 'ApostasController@pontos');
