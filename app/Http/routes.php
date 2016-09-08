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



// ================= Admin Only ================= //

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
  // Users
    Route::get('/admin/dashboard', 'AdminController@index');
    Route::get('admin/users', 'AdminController@manageUsers');
    Route::get('/admin/users/create', 'UsersController@create');
    Route::post('/admin/users', 'UsersController@store');
    Route::get('/admin/users/{user}/edit', 'AdminController@editOrgLogin');
    Route::put('/admin/users/{user}', 'AdminController@updateOrgLogin');
    Route::get('/admin/users/delete', 'AdminController@deleteUser');
    Route::delete('/admin/users/{user}', 'UsersController@destroy');

    // Companies
    Route::get('/admin/companies/create', 'CompaniesController@create');
    Route::post('/admin/companies', 'CompaniesController@store');
    Route::delete('/admin/companies/{company}', 'CompaniesController@destroy');

    // Contacts
    Route::get('/admin/contacts/create', 'ContactsController@create');
    Route::post('/admin/contacts', 'ContactsController@store');
    Route::get('/admin/contacts/{contact}/edit', 'AdminController@editOrgContact');
    Route::put('/admin/contacts/{contact}', 'AdminController@updateOrgContact');
    Route::delete('/admin/contacts/{contact}', 'ContactsController@destroy');

    // Events
    Route::get('/admin/events', 'AdminController@eventIndex');
    Route::get('/admin/events/create', 'AdminController@createEvent');
    Route::post('/admin/events', 'AdminController@storeEvent');
    Route::get('/admin/events/{event}/edit', 'AdminController@editEvent');
    Route::put('/admin/events/{event}', 'AdminController@updateEvent');
    Route::delete('/admin/events/{event}', 'AdminController@destroyEvent');

    // Articles
    Route::get('/admin/articles', 'ArticlesController@adminIndex');
    Route::get('/admin/articles/create', 'ArticlesController@create');
    Route::post('/admin/articles', 'ArticlesController@store');
    Route::get('/admin/articles/{article}/edit', 'ArticlesController@edit');
    Route::post('/admin/articles/{article}', 'ArticlesController@update');
    Route::delete('/admin/articles/{article}', 'ArticlesController@destroy');

    // Carousels
    Route::get('/admin/carousels', 'CarouselsController@adminIndex');
    Route::get('/admin/carousels/create', 'CarouselsController@create');
    Route::post('/admin/carousels', 'CarouselsController@store');
    Route::get('/admin/carousels/{carousel}/edit', 'CarouselsController@edit');
    Route::post('/admin/carousels/{carousel}', 'CarouselsController@update');
    Route::delete('/admin/carousels/{carousel}', 'CarouselsController@destroy');

    //RFPs
    Route::get('/admin/rfps', 'AdminController@rfpIndex');
    Route::get('/admin/rfps/create', 'AdminController@createRfp');
    Route::post('/admin/rfps', 'AdminController@storeRfp');
    Route::get('/admin/rfps/{rfp}/edit', 'AdminController@editRfp');
    Route::post('/admin/rfps/{rfp}', 'AdminController@updateRfp');
    Route::delete('/admin/rfps/{rfp}', 'AdminController@destroyRfp');
});

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
Route::get('/events/search', 'EventsController@searchEvents');
Route::put('/events/{event}', 'EventsController@update');
Route::resource('events', 'EventsController');

// Leaders
Route::put('/leaders/{leader}', 'LeadersController@update');
Route::resource('leaders', 'LeadersController');

// RFPs
Route::resource('rfps', 'RFPController');

// Articles
Route::get('/articles', 'ArticlesController@index');
