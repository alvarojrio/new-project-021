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
     // return view('site.index');
          echo 'nenhum pacote selecionada';
})->name('web');


//checkout page
Route::get('/pacote/{id}', 'WebSiteController@index')->name('pacote');

/*LancamentosController*/

Route::get('/admin/financeiro/lancamentos', 'LancamentosController@index');
Route::get('/admin/financeiro/lancamentos/detalhe/{id}', 'LancamentosController@detalhe')->name('detalhes-lancamento');

/*LancamentosController*/

//busca os tipos de ingressos pf ou grupo
Route::post('/buscar-tipos-ingresso', 'WebSiteController@buscarTipoIngressos')->name('buscarajax');

//busca os ingressos pfs
Route::post('/buscar-ingressos-pf', 'WebSiteController@buscarIngressosPf')->name('
buscar-ingressos-pf');

//busca os ingressos pfs
Route::post('/add-cart', 'CarrinhoController@addCart')->name('
buscar-ingressos-pf');






//busca os ingressos pfs
Route::post('/loginuser', 'LoginUsuarioController@loginUsuario')->name('loginUser');

Route::post('/createuser', 'LoginUsuarioController@createUser')->name('createuser');


Route::post('/verificaCpf', 'ClienteController@verificaCpf')->name('cadastrarUsuario');

Route::post('/cadastrarUsuario', 'ClienteController@store')->name('store');



Route::post('/consultarUsuarioLogado', 'LoginUsuarioController@consultarUsuarioLogado')->name('createuser');






Route::get('/login', function () {
      return view('site.login');
})->name('login');

Route::get('/cadastro-usuario', function () {
      return view('site.cadastrar');
})->name('cadastro');



//somente logado..
Route::group(array('middleware' => array('authcliente:cliente')), function() {
		//page checkout
		//Route::get('/checkout', function () {
		//})->name('checkout');

       
            Route::get('/checkout', 'CheckoutController@index')->name('checkout');
           
            Route::post('/finalizar-pedido-cielo', 'FinalizarPedidoCieloController@postPagarCielo');
            Route::post('/finalizar-pedido-pagseguro-credito', 'FinalizarPedidoPagseguroCreditoController@postPagarPagseguroCredito');
            

});