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
Route::get('/pacote/{id}', 'WebSiteController@index')->name('checkout');


//busca os tipos de ingressos pf ou grupo
Route::post('/buscar-tipos-ingresso', 'WebSiteController@buscarTipoIngressos')->name('buscarajax');

//busca os ingressos pfs
Route::post('/buscar-ingressos-pf', 'WebSiteController@buscarIngressosPf')->name('
buscar-ingressos-pf');

//busca os ingressos pfs
Route::post('/add-cart', 'WebSiteController@addCart')->name('
buscar-ingressos-pf');




//page checkout
Route::get('/checkout', function () {
      return view('site.checkout');
})->name('checkout');

Route::get('/login', function () {
      return view('site.login');
})->name('login');

Route::get('/cadastro-usuario', function () {
      return view('site.cadastro');
})->name('cadastro');

