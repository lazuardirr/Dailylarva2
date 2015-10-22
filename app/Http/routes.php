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

Route::get('/', 'TestDebug@index');
Route::get('agents', 'AgentsController@index');
Route::get('agents/new', 'AgentsController@create');
Route::post('agents', 'AgentsController@store');
Route::get('agents/{id}', 'AgentsController@show');