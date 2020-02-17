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
      return view('site.index');
})->name('web');

Route::get('/checkout', function () {
      return view('site.checkout');
})->name('checkout');

Route::get('/login', function () {
      return view('site.login');
})->name('login');

Route::get('/cadastro-usuario', function () {
      return view('site.cadastro');
})->name('cadastro');

