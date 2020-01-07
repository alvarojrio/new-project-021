<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
      return view('index');
})->name('home');

Route::get('/', function () {
      return view('admin.index');
})->name('admin');


//pagina de cadastro
Route::get('/evento', function () {
      return view('admin.eventos.cadastrar-evento');
});


//cadastro o evento
Route::post('/evento/create', 'EventoController@store');

//pagina de view evento
Route::get('/evento/basico/{edit}', array(
	  'uses' =>'EventoController@step_one'
))->name('start-step');



Route::get('/evento/detalhe/{edit}', array(
	  'uses' =>'EventoController@step_two_detais'
))->name('step_two_detais');



Route::get('/evento/tickets/{edit}', array(
	  'uses' =>'EventoController@step_one_tickets'
))->name('step_one_tickets');


//js
Route::post('/ingresso/showTickets', array(
	  'uses' =>'IngressosController@showTickets'
))->name('showtickets');


Route::post('/ingresso/createTicket', array(
	  'uses' =>'IngressosController@createTicket'
))->name('createTicket');

