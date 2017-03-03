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

Route::get('/', 'PaginasCtrl@index')->name('inicio');

Route::get('/sair', function(){
	Auth::logout();
    return Redirect::route('inicio');
})->name('sair');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
	Route::get('/', 'DashboardCtrl@index')->name('dash.home')->middleware('auth');

	Route::group(['prefix' => 'questionario'], function(){

		Route::get('', 'QuestionarioCtrl@index')->name('questionario');
		Route::get('/cadastrar', 'QuestionarioCtrl@getCadastrar')->name('questionario.cadastrar');
	});
});

