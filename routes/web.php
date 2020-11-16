<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('financeiro', ['as' => 'adm.financeiro', 'uses' => 'App\Http\Controllers\PageController@financeiro']);
	Route::get('pdv', ['as' => 'pdv.pdv', 'uses' => 'App\Http\Controllers\PageController@pdv']);
	/**************************** Fornecedores ********************************/
	/* List */
	Route::get('fornecedores', ['as' => 'adm.fornecedores', 'uses' => 'App\Http\Controllers\Adm\FornecedoresController@pageFornecedores']);
	/* Cadastro/Insert */
	Route::get('fornecedores/cadastro', ['as' => 'adm.fornecedores.cadFornecedores', 'uses' => 'App\Http\Controllers\PageController@cadFornecedores']);
	Route::post('fornecedores/insertFornecedor', ['as' => 'cadastro.fornecedor', 'uses' => 'App\Http\Controllers\Adm\FornecedoresController@insertFornecedor']);
	/* Edit/Update */
	Route::get('fornecedor/edit/{id}', ['as' => 'adm.fornecedores.editFornecedor', 'uses' => 'App\Http\Controllers\Adm\FornecedoresController@pageEditFornecedor']);
	Route::put('fornecedores/updateFornecedor', ['as' => 'update.fornecedor', 'uses' => 'App\Http\Controllers\Adm\FornecedoresController@updateFornecedor']);

	/**************************** Produtos ********************************/
	/* Cadastro/Insert */
	Route::get('produtos/cadastro', ['as' => 'adm.produtos.produtos-cadastro', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@pageCadProd']);
	Route::post('produtos/insertProduto', ['as' => 'adm.produtos.insertProduto', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@insertProduto']);
	/* Edit/Update */
	Route::get('produtos', ['as' => 'adm.produtos', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@pageProd']);
	Route::get('produto/edit/{id}', ['as' => 'adm.produtos.editProdbyId', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@pageEditProdbyId']);
	Route::put('produto/updateProduto', ['as' => 'adm.produtos.updateProduto', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@updateProduto']);
	/* Delete */
	Route::get('produtos/excluir', ['as' => 'adm.produtos.produtos-excluir', 'uses' => 'App\Http\Controllers\PageController@produtosExcluir']);
	/**************************** Configuração ********************************/
	Route::get('config/empresa', ['as' => 'config.empresa', 'uses' => 'App\Http\Controllers\Config\ConfigController@pageConfig']);
	Route::put('config/empresa/update', ['as' => 'config.empresa.update', 'uses' => 'App\Http\Controllers\Config\ConfigController@updateConfig']);

	/**************************** Estoque ********************************/
	Route::get('estoque', ['as' => 'adm.estoque', 'uses' => 'App\Http\Controllers\Adm\EstoqueController@pageEstoque']);
	Route::get('estoque/cadastro', ['as' => 'adm.estoque.entrada', 'uses' => 'App\Http\Controllers\Adm\EstoqueController@pageEntradaEstoque']);
	Route::get('estoque/ajustar', ['as' => 'adm.estoque.ajustar', 'uses' => 'App\Http\Controllers\Adm\EstoqueController@pageAjustarEstoque']);
	Route::post('estoque/buscaProd/byCod', ['as' => 'adm.produtos.buscaProd', 'uses' => 'App\Http\Controllers\Adm\ProdutosController@selectProdbyCod']);

	
	/** 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 * Original
	 * 
	 * 
	 * 
	 * 
	 * 
	 * 
	 */
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
