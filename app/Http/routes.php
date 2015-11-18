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

// Public routes
Route::get('/', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Routes screens
    Route::resource('/users', 'UsersController');
    Route::resource('/loans', 'LoansController');
    Route::resource('/renew-loan-items', 'RenewLoanItemsController');
    Route::resource('/return-loan-items', 'ReturnLoanItemsController');
});

Route::group(['namespace' => 'Api', 'prefix' => 'api', 'middleware' => 'auth'], function() {
    // Routes services
    Route::resource('/users', 'UsersController');
    Route::resource('/loans', 'LoansController');
    Route::resource('/copies', 'CopiesController');
});
