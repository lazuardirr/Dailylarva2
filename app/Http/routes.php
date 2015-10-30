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

Route::get('/', ['as' => 'home', function () {
    return view('adminlte');
}]);
Route::resource('agents', 'AgentsController');
Route::get('movies/json/{title}', 'MoviesController@getMovie');
Route::resource('movies', 'MoviesController');
Route::resource('server', 'ServerController');
//Route::resource('development', 'DevelopmentController');
Route::get('broadcast', function(){
    return view('pages.broadcastiot');
});
Route::get('broadcast/sources', function(){
    return htmlspecialchars(view('pages.broadcastiot')->render());
});