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
Route::get('users/{user}/edit', 'UsersController@edit');
Route::put('users/{user}', 'UsersController@update');
Route::delete('users/{user}', 'UsersController@destroy');
Route::get('users/search', 'UsersController@searchMembers');
Route::get('/admin/dashboard', 'UsersController@getAdminDashboard');

// Companies
Route::get('companies/create', 'CompaniesController@create');
Route::get('companies/{company}', 'CompaniesController@show');
Route::get('companies/{company}/edit', 'CompaniesController@edit');
Route::put('companies/{company}', 'CompaniesController@update');
Route::delete('companies/{company}', 'CompaniesController@destroy');
Route::get('companies/{company}/dashboard', 'CompaniesController@dashboard');
Route::get('companies/{company}/connections', 'CompaniesController@viewConnections');

// Contacts
Route::get('contacts/{contact}/edit', 'ContactsController@edit');
Route::put('contacts/{contact}', 'ContactsController@update');
Route::delete('contacts/{contact}', 'ContactsController@destroy');

// Events
Route::resource('events', 'EventsController');

// Carousels
Route::resource('carousels', 'CarouselsController');

// Leaders
Route::resource('leaders', 'LeadersController');

// RFPs
Route::resource('rfps', 'RFPsController');
