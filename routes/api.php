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

Route::get('/request', 'API\UserRequestController@index')->name('request.index')->middleware('jwt.verify');
Route::post('/request', 'API\UserRequestController@store')->name('request.store')->middleware('jwt.verify');

Route::post('/login', 'API\LoginController@login')->name('login');
Route::post('/register', 'API\RegisterController@register')->name('register');
Route::get('/logout', 'API\LoginController@logout')->name('logout')->middleware('jwt.verify');
Route::get('/get_user', 'API\LoginController@get_user')->name('get_user')->middleware('jwt.verify');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
