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


Route::get('/admin/login', function () {
      return view('index');
})->name('admin-login');

Route::get('/admin/logar', function () {
      return view('admin.login.index');
})->name('admin-login');

Route::post('/admin/action', 'EventoController@login')->name('admin-logar');






Route::group(array('middleware' => array('authcliente:cliente')), function() {
	

Route::get('/admin', function () {
      return view('index');
})->name('home');


Route::get('/admin', function () {
      return view('admin.index');
})->name('adminzao');


//pagina de cadastro
Route::get('/evento/listar', 'EventoController@index');

//pagina de cadastro
Route::get('/evento', function () {
      return view('admin.eventos.cadastrar-evento');
});


//cadastro o evento
Route::post('/evento/create', 'EventoController@store');

//cadastro o update
Route::post('/evento/update', 'EventoController@update');



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




Route::get('/admin/clientes/listar', array(
	'uses' =>'ClientesController@listar'
))->name('clientes-listar');



Route::get('/admin/clientes/editar/{id}', array(
	'uses' =>'ClientesController@editar'
))->name('clientes-editar');

Route::post('/admin/clientes/acaoEditar', array(
	'uses' =>'ClientesController@acaoEditar'
))->name('clientes-acaoEditar');




Route::get('/admin/clientes/cadastrar', array(
	'uses' =>'ClientesController@getCriarUsuario'
))->name('clientes-cadastrar');

Route::post('/admin/clientes/acaoCreate', array(
	'uses' =>'ClientesController@createUser'
))->name('clientes-acaoCreate');





Route::post('/admin/clientes/ajaxListar', array(
	'uses' =>'ClientesController@ajaxListar'
))->name('clientesajaxListar');





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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/local/listar', 'LocalController@getLocal')->name('local-index');
Route::get('/admin/local/cadastrar', 'LocalController@getLocalCadastrar')->name('local-cadastrar');
Route::get('/admin/local/editar', 'LocalController@getLocalEditar')->name('local-editar');

});