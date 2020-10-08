<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('estoque', ['as' => 'adm.estoque', 'uses' => 'App\Http\Controllers\PageController@estoque']);
	Route::get('financeiro', ['as' => 'adm.financeiro', 'uses' => 'App\Http\Controllers\PageController@financeiro']);
	Route::get('fornecedores', ['as' => 'adm.fornecedores', 'uses' => 'App\Http\Controllers\PageController@fornecedores']);
	Route::get('fornecedores/cadastro', ['as' => 'adm.fornecedores.cadFornecedores', 'uses' => 'App\Http\Controllers\PageController@cadFornecedores']);
	Route::get('produtos/cadastro', ['as' => 'adm.produtos.produtos-cadastro', 'uses' => 'App\Http\Controllers\PageController@produtosCadastro']);
	Route::get('produtos/excluir', ['as' => 'adm.produtos.produtos-excluir', 'uses' => 'App\Http\Controllers\PageController@produtosExcluir']);
	
	/** old */
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/pdv', function (){
	return view('pdv.pdv');
});