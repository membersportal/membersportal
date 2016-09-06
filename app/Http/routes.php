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

// ================= User and Admin Access ================= //

// Auth
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Users
Route::get('/', 'UsersController@index');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::put('/users/{user}', 'UsersController@update');

// Companies
Route::get('/companies/{company}', 'CompaniesController@show');
Route::get('/companies/{company}/edit', 'CompaniesController@edit');
Route::put('/companies/{company}', 'CompaniesController@update');
Route::get('/search', 'CompaniesController@searchMembers');
Route::get('/search/results', 'CompaniesController@getSearchedCompanies');
Route::get('/companies/{company}/dashboard', 'CompaniesController@dashboard');
Route::get('/companies/{company}/connections', 'CompaniesController@viewConnections');

// Contacts
Route::get('/contacts/{contact}/edit', 'ContactsController@edit');
Route::put('/contacts/{contact}', 'ContactsController@update');

// Connections
Route::get('/connections/{user}', 'ConnectionsController@show');
Route::post('/connections/{user}', 'ConnectionsController@store');
Route::delete('/connections/{user}', 'ConnectionsController@destroy');

// Events
Route::resource('events', 'EventsController');

// Leaders
Route::resource('leaders', 'LeadersController');

// RFPs
Route::resource('rfps', 'RFPController');

// Articles
Route::get('articles', 'ArticlesController@index');


// ================= Admin Only ================= //
    // Users
    Route::get('/admin/users/create', 'UsersController@create');
    Route::post('/admin/users/store', 'UsersController@store');
    Route::delete('/admin/users/{user}', 'UsersController@destroy');
    Route::get('/admin/userssearch', 'UsersController@deleteUserSearch');
    Route::get('/admin/users/deleteUser', 'UsersController@adminDeleteUser');
    Route::get('/admin/dashboard', 'UsersController@getAdminDashboard');
    Route::get('/admin/users/edit', 'UsersController@editUsers');

    // Companies
    Route::get('/admin/companies/create', 'CompaniesController@create');
    Route::post('/admin/companies/store', 'CompaniesController@store');
    Route::get('/admin/companies/{company}/edit', 'CompaniesController@edit');
    Route::put('/admin/companies/{company}', 'CompaniesController@update');
    Route::delete('/admin/companies/{company}', 'CompaniesController@destroy');

    // Contacts
    Route::get('/admin/contacts/create', 'ContactsController@create');
    Route::post('/admin/contacts/store', 'ContactsController@store');
    Route::get('/admin/contacts/{company}/edit', 'ContactsController@edit');
    Route::put('/admin/contacts/{company}', 'ContactsController@update');
    Route::delete('/admin/contacts/{contact}', 'ContactsController@destroy');

    // Events
    Route::get('/admin/events/create', 'EventsController@create');
    Route::post('/admin/events', 'EventsController@store');
    Route::get('/admin/events/{event}/edit', 'EventsController@edit');
    Route::put('/admin/events/{event}', 'EventsController@update');
    Route::get('/admin/eventsview', 'EventsController@editgeneral');
    Route::delete('/admin/events/{event}', 'EventsController@destroy');

    // Articles
    Route::get('/admin/articles/create', 'ArticlesController@create');
    Route::post('/admin/articles', 'ArticlesController@store');
    Route::get('/admin/articles/{article}/edit', 'ArticlesController@edit');
    Route::put('/admin/articles/{article}', 'ArticlesController@update');
    Route::delete('/admin/articles/{article}', 'ArticlesController@destroy');

    // Carousels
    Route::get('/admin/carousels/create', 'CarouselsController@create');
    Route::post('/admin/carousels', 'CarouselsController@store');
    Route::get('/admin/carousels/{carousel}/edit', 'CarouselsController@edit');
    Route::put('/admin/carousels/{carousel}', 'CarouselsController@update');
    Route::delete('/admin/carousels/{carousel}', 'CarouselsController@destroy');
    Route::get('/admin/carouselsview', 'CarouselsController@editgeneral');
