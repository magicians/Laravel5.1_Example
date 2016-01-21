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

Route::get('/', function () {
    return view('welcome');
});

// routes for the authors
Route::resource('author/article', 'Author\ArticleController');
Route::get('author/tag', 'Author\TagController@index');

//route for the admins
Route::resource('admin/article', 'Admin\ArticleController',
    ['only' => ['index', 'show', 'update']]);
Route::resource('admin/tag', 'Admin\TagController',
    ['except' => ['show']]);
Route::resource('admin/user', 'Admin\UserController');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

