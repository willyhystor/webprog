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
@Author : Willy Hystor
@Email : willy.astore@gmail.com
*/

Route::get('/', 'Home@home');
Route::get('/register', 'Customer@register');
Route::get('/login', 'Customer@login');
Route::get('/logout', 'Customer@logout');
Route::get('/profile', 'Customer@profile');

/*admin*/
Route::get('/insert-cake', 'Admin@insert_cake');
Route::get('/manage-cake', 'Admin@manage_cake');
Route::get('/manage-cake/{id}', 'Admin@manage_cake');
Route::get('/delete-cake/{id}', 'Admin@delete_cake');
Route::get('/manage-profiles', 'Admin@manage_profiles');
Route::get('/manage-categories', 'Admin@manage_categories');
Route::get('/manage-category/{id}', 'Admin@manage_categories');
Route::get('/delete-category/{id}', 'Admin@delete_categories');
Route::get('/transaction-history', 'Admin@transaction_history');

Route::group(['prefix' => 'rest'], function (){
	Route::post('/register', 'Rest\Customer@regis');
	Route::post('/login', 'Rest\Customer@login');
	Route::post('/update_profile', 'Rest\Customer@update_profile');

	Route::post('/insert-cake', 'Rest\Admin@insert_cake');
	Route::post('/update-cake', 'Rest\Admin@update_cake');
	Route::post('/update_profile', 'Rest\Customer@update_profile');
	Route::post('/update_profile', 'Rest\Customer@update_profile');
});