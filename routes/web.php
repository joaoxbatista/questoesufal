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


/**
*Rotas dos estudantes
*/
Route::group(['prefix' => 'estudantes'], function(){

	Route::group(['middleware' => 'student_guest'], function(){
		Route::get('login', 'Auth\StudentLoginController@showLoginForm')->name('student.login.show');
	});

	Route::post('login', 'Auth\StudentLoginController@login')->name('student.login');
	Route::get('register', 'Auth\StudentRegisterController@showRegistrationForm')->name('student.register.show');
	Route::post('register', 'Auth\StudentRegisterController@register')->name('student.register');

	Route::group(['middleware' => 'auth:student'], function(){
		Route::get('dashboard', 'StudentController@index')->name('student.dashboard');
		Route::post('logout', 'Auth\StudentLoginController@logout')->name('student.logout');
		Route::get('logout', 'Auth\StudentLoginController@logout')->name('student.logout.get');
		Route::post('update', 'StudentController@updatePerfil')->name('student.perfil.update');
		Route::get('perfil', 'StudentController@perfil')->name('student.perfil');

		/**
		* Rotas para acessar os questionários
		*/
		Route::get('questionarios', 'QuestionnaireCtrl@getQuestionnaires')->name('student.questionnaire');
	});

});

/**
*Rotas das Páginas
*/
Route::get('/', 'PagesCtrl@index')->name('inicio');

/**
*Rotas para realizar login
*/

Auth::routes();

Route::get('/sair', function(){
	Auth::logout();
	return Redirect::route('inicio');
})->name('sair');


/**
*Rotas para repostas de questionários. Não existe necessidade de authenticação
*/
Route::group(['prefix' => 'responder'], function(){
	Route::get('/{id}', 'AnswareCtrl@getQuestionnarie')->name('answare.questionnaire.view');
	Route::post('/enviar', 'AnswareCtrl@Store')->name('answare.questionnaire.store');
});


/**
* Rotas com necessidade de authenticação - Dashboard Administratívo
*/
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
	Route::get('', 'DashboardCtrl@index')->name('dash.home');


	/**
	*Rotas para visualização de respostas
	*/
	Route::get('respostas', 'AnswareCtrl@index')->name('answare');

	/**
	*Rotas para questionários
	*/
	Route::group(['prefix' => 'questionario'], function(){

		Route::get('', 'QuestionnaireCtrl@index')->name('questionnaire');

		Route::get('criar', 'QuestionnaireCtrl@createGet')->name('questionnaire.create');
		Route::post('criar', 'QuestionnaireCtrl@createPost')->name('questionnaire.create');

		Route::get('editar/{id}', 'QuestionnaireCtrl@editGet')->name('questionnaire.edit');
		Route::post('editar', 'QuestionnaireCtrl@editPost')->name('questionnaire.postEdit');

		Route::get('deletar/{id}', 'QuestionnaireCtrl@deleteGet')->name('questionnaire.delete');

		Route::get('view/{id}', 'QuestionnaireCtrl@view')->name('questionnaire.view');

		/**
		*Rotas para questões fechadas
		*/
		Route::group(['prefix' => 'questao_fechada'], function(){

			Route::get('', 'CloseQuestionCtrl@index')->name('close_question');

			Route::post('criar', 'CloseQuestionCtrl@create')->name('close_question.create');

			Route::post('salvar', 'CloseQuestionCtrl@createPost')->name('close_question.save');

			Route::get('editar/{id}', 'CloseQuestionCtrl@editGet')->name('close_question.edit.get');
			Route::post('editar', 'CloseQuestionCtrl@editPost')->name('close_question.edit');

			Route::get('apagar/{id}', 'CloseQuestionCtrl@deleteGet')->name('close_question.delete.get');
			Route::post('apagar', 'CloseQuestionCtrl@deletePost')->name('close_question.delete');

			/**
			*Rotas para alternativas
			*/
			Route::group(['prefix' => 'alternativa'], function(){

				Route::get('adicionar/{id}', 'AlternativeCtrl@add')->name('alternative.add');
				Route::post('adicionar', 'AlternativeCtrl@addPost')->name('alternative.add.post');


				Route::post('editar', 'AlternativeCtrl@editPost')->name('alternative.edit');

				Route::get('apagar/{id}', 'AlternativeCtrl@deleteGet')->name('alternative.delete');

			});

		});

		/**
		*Rotas para questões abertas
		*/
		Route::group(['prefix' => 'questao_aberta'], function(){

			Route::get('', 'OpenQuestionCtrl@index')->name('open_question');

			Route::post('', 'OpenQuestionCtrl@getStore')->name('open_question');

			Route::post('criar', 'OpenQuestionCtrl@store')->name('open_question.save');

			Route::get('editar/{id}', 'OpenQuestionCtrl@editGet')->name('open_question.edit.get');
			Route::post('editar', 'OpenQuestionCtrl@editPost')->name('open_question.edit');

			Route::get('apagar/{id}', 'OpenQuestionCtrl@deleteGet')->name('open_question.delete.get');
			Route::post('apagar', 'OpenQuestionCtrl@deletePost')->name('open_question.delete');

		});
	});
});
