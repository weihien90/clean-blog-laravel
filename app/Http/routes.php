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

// Homepage
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', 'HomeController@index');

// Static pages
Route::get('/about', ['as' => 'about', 'uses' => 'StaticPageController@about']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'StaticPageController@contact']);

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Management routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('post', 'PostController', ['except' => ['show']]);
});

// Show Blogpost
Route::get('{year}/{month}/{day}/{slug}', 'PostController@show');
