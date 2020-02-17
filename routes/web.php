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


Route::get('/admin', function () {
      return view('index');
})->name('home');


Route::get('/admin', function () {
      return view('admin.index');
})->name('admin');


//pagina de cadastro
Route::get('/evento/listar', 'EventoController@index');

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


Route::post('/evento/detalhes/create', array(
	  'uses' =>'EventoController@detalhesCreate'
))->name('detalhesCreate');





//js
Route::post('/ingresso/showTickets', array(
	  'uses' =>'IngressosController@showTickets'
))->name('showtickets');


Route::post('/ingresso/createTicket', array(
	  'uses' =>'IngressosController@createTicket'
))->name('createTicket');


Route::post('/ingresso/updateTicket', array(
	  'uses' =>'IngressosController@updateTicket'
))->name('updateTicket');

//
Route::post('/ingresso/showTicketsid', array(
	  'uses' =>'IngressosController@showTicketsid'
))->name('showTicketsid');
//
Route::post('/ingresso/excluirTickets', array(
	  'uses' =>'IngressosController@excluirTickets'
))->name('excluirTickets');
