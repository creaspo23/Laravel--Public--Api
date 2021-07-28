<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



 Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/request', function () {
    return view('request');
})->middleware('auth');
Route::get('/users/userLogout', 'Auth\LoginController@userLogout')->name('users.logout');
Route::get('/invoice/{user}', 'Auth\InvoiceController@show')->middleware('auth:admin');
Route::prefix('admin')->group(function () {
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
 
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
