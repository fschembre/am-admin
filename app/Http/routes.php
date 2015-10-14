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

Route::get('test', function ()    {
    return view('test');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', ['middleware' => 'auth', 'uses' => 'HomeController@index']);
Route::get('/home', ['middleware' => 'auth', 'uses' => 'HomeController@index']);
Route::get('/employees', ['middleware' => 'auth', 'uses' => 'HomeController@employees']);
Route::get('/users', ['middleware' => 'auth', 'uses' => 'HomeController@users']);
//Route::post('/employees', ['middleware' => 'auth', 'uses' => 'HomeController@employeesPost']);

Route::get('/employees/get/{id}', ['middleware' => 'auth', 'uses' => 'AjaxController@getEmployee']);

Route::get('/test2', ['middleware' => 'auth', 'uses' => 'HomeController@test']);

//A route to handle this Ajax request
Route::post('/saveInterests',array('as'=>'interests.Profile','uses'=>'HomeController@saveInterests'));

Route::get('dos','HomeController@DOS');

Route::post('/employees', function()
{
    return View::make('pages.home');
});



