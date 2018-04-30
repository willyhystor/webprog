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

Route::get('/', 'homeController@home');
Route::get('/register', 'Customer@register');
Route::get('/login', 'Customer@login');
Route::get('/logout', 'Customer@logout');

Route::group(['prefix' => 'rest'], function (){
	Route::post('/register', 'Rest\Register@regis');
	Route::post('/login', 'Rest\Login@login');
});