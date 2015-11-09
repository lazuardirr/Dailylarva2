<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'middleware' => 'auth', function () {
    return view('adminlte');
}]);
Route::resource('agents', 'AgentsController');
Route::get('movies/json/{title}', 'MoviesController@getMovie');
Route::post('movies/{movies}/filter', 'MoviesController@postFilter');
Route::resource('movies', 'MoviesController');
Route::resource('server', 'ServerController');
Route::get('dev', 'DevelopmentController@index')->name('dev.index');
Route::get('dev/progress', 'DevelopmentController@progress')->name('dev.progress');
Route::get('dev/task', 'DevelopmentController@getTask')->name('dev.task');
Route::post('dev/task', 'DevelopmentController@postTask');
Route::get('dev/task/{tasks}', 'DevelopmentController@showTask')->name('dev.task.show');
Route::patch('dev/task/{tasks}', 'DevelopmentController@taskProgress')->name('dev.task.progress');
Route::get('dev/issue', 'DevelopmentController@getIssue')->name('dev.issue');
Route::post('dev/issue', 'DevelopmentController@postIssue');
Route::get('dev/issue/{issue}', 'DevelopmentController@getFixIssue')->name('dev.issue.edit');
Route::patch('dev/issue/{issue}', 'DevelopmentController@postFixIssue')->name('dev.issue.fix');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('broadcast', function(){
    return view('pages.broadcastiot');
});
Route::get('broadcast/sources', function(){
    return htmlspecialchars(view('pages.broadcastiot')->render());
});
Route::get('bc2', function () {
    return view('pages.bc2');
});
Route::get('ieee/iot/2015/pricing', function () {
    return view('pages.bc2');
});