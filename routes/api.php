<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/game/start','GameController@start');
Route::get('/item','ItemController@get');


Route::get('/game/{id}','GameController@getGame');
Route::post('/game/stay_leave','GameController@generateActions');
