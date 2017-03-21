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


Auth::routes();

/**
*Rotas das Páginas
*/
Route::get('/', 'PaginasCtrl@index')->name('inicio');


/**
*Rotas do Login
*/
Route::get('/sair', function(){
	Auth::logout();
    return Redirect::route('inicio');
})->name('sair');


/**
*Rotas do Painel
*/
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
	Route::get('', 'DashboardCtrl@index')->name('dash.home')->middleware('auth');

	Route::group(['prefix' => 'questionario'], function(){

		/*Listagem de questionários*/
		Route::get('', 'QuestionarioCtrl@index')->name('questionario');

		/*Registro de questionários*/
		Route::get('cadastrar', 'QuestionarioCtrl@getCadastrar')->name('questionario.cadastrar');
		Route::post('cadastrar', 'QuestionarioCtrl@postCadastrar')->name('questionario.cadastrar');

		/*Edição de questionários*/
		Route::get('editar/{id}', 'QuestionarioCtrl@getEditar')->name('questionario.getEditar');
		Route::post('editar', 'QuestionarioCtrl@postEditar')->name('questionario.postEditar');

		/*Remoção de questionários*/
		Route::get('delete/{id}', 'QuestionarioCtrl@getDeletar')->name('questionario.getDeletar');
		Route::post('delete', 'QuestionarioCtrl@postDeletar')->name('questionario.postDeletar');
	});
});

