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

// Auth
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Users
Route::get('/', 'UsersController@index');
Route::get('users/{user}', 'UsersController@show');
Route::get('users/{user}/edit', 'UsersController@editAccountLogin');
Route::put('users/{user}', 'UsersController@update');
Route::delete('users/{user}', 'UsersController@destroy');
Route::get('users/search', 'UsersController@searchMembers');
Route::get('users/{user}/dashboard', 'UsersController@dashboard');
Route::get('users/{user}/connections', 'UsersController@viewConnections');

// Companies
Route::resource('companies', 'CompaniesController');

// Contacts
Route::resource('contacts', 'ContactsController');

// Events
Route::resource('events', 'EventsController');

// Carousels
Route::resource('carousels', 'CarouselsController');

// Leaders
Route::resource('leaders', 'LeadersController');

// RFPs
Route::resource('rfps', 'RFPsController');
