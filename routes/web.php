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
Route::get('/', 'PagesCtrl@index')->name('inicio');


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
	Route::get('', 'DashboardCtrl@index')->name('dash.home');

	/**
	*Rotas para questionários
	*/
	Route::group(['prefix' => 'questionario'], function(){

		Route::get('', 'QuestionnaireCtrl@index')->name('questionnaire');
		Route::get('criar', 'QuestionnaireCtrl@createGet')->name('questionnaire.create');
		Route::post('criar', 'QuestionnaireCtrl@createPost')->name('questionnaire.create');

		Route::get('editar/{id}', 'QuestionnaireCtrl@editGet')->name('questionnaire.edit');
		Route::post('editar', 'QuestionnaireCtrl@editPost')->name('questionnaire.postEdit');

		Route::get('apagar', 'QuestionnaireCtrl@deleteGet')->name('questionnaire.delete');
		Route::post('apagar', 'QuestionnaireCtrl@deletePost')->name('questionnaire.delete');

		Route::get('view/{id}', 'QuestionnaireCtrl@view')->name('questionnaire.view');

		/**
		*Rotas para questões fechadas
		*/
		Route::group(['prefix' => 'questao_fechada'], function(){

			Route::get('', 'CloseQuestionCtrl@index')->name('close_question');
			Route::get('criar', 'CloseQuestionCtrl@createGet')->name('close_question.create');
			Route::post('criar', 'CloseQuestionCtrl@createPost')->name('close_question.create');

			Route::get('editar', 'CloseQuestionCtrl@editGet')->name('close_question.edit');
			Route::post('editar', 'CloseQuestionCtrl@editPost')->name('close_question.edit');

			Route::get('apagar', 'CloseQuestionCtrl@deleteGet')->name('close_question.delete');
			Route::post('apagar', 'CloseQuestionCtrl@deletePost')->name('close_question.delete');

			/**
			*Rotas para alternativas
			*/
			Route::group(['prefix' => 'alternativa'], function(){

				Route::get('adicionar/{id}', 'AlternativeCtrl@add')->name('alternative.add');
				Route::post('adicionar', 'AlternativeCtrl@addPost')->name('alternative.add.post');
				
				Route::get('editar', 'AlternativeCtrl@editGet')->name('alternative.edit');
				Route::get('editar', 'AlternativeCtrl@editPost')->name('alternative.edit');

				Route::get('apagar', 'AlternativeCtrl@deleteGet')->name('alternative.delete');
				Route::get('apagar', 'AlternativeCtrl@deletePost')->name('alternative.delete');
			});	

		});

		/**
		*Rotas para questões abertas
		*/
		Route::group(['prefix' => 'questao_aberta'], function(){

			Route::get('', 'OpenQuestionCtrl@index')->name('open_question');
			Route::get('criar', 'OpenQuestionCtrl@createGet')->name('open_question.create');
			Route::post('criar', 'OpenQuestionCtrl@createPost')->name('open_question.create');

			Route::get('editar', 'OpenQuestionCtrl@editGet')->name('open_question.edit');
			Route::post('editar', 'OpenQuestionCtrl@editPost')->name('open_question.edit');

			Route::get('apagar', 'OpenQuestionCtrl@deleteGet')->name('open_question.delete');
			Route::post('apagar', 'OpenQuestionCtrl@deletePost')->name('open_question.delete');

		});
	});
});

