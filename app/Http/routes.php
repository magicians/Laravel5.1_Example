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

Route::get('/', 'User\UserController@index');
Route::get('/subject/{id}', 'User\UserController@subject');
Route::get('/article/{id}', 'User\UserController@showArticle');

// Routes for the authors
Route::resource('author/article', 'Author\ArticleController');
Route::get('author/tag', 'Author\TagController@index');

// Upload the image
Route::post('author/upload', [
    'as' => 'author.upload',
    'uses' => 'Author\InfoController@uploadImage'
]);
Route::post('author/pageImage', [
    'as' => 'author.pageImage',
    'uses' => 'Author\InfoController@uploadPageImage'
]);

//Browse the image
Route::get('author/browse', [
    'as' => 'author.browse',
    'uses' => 'Author\InfoController@browseImage'
]);

//route for the admins
Route::resource('admin/article', 'Admin\ArticleController',
    ['only' => ['index', 'show', 'update']]);
Route::resource('admin/tag', 'Admin\TagController',
    ['except' => ['show']]);
Route::resource('admin/user', 'Admin\UserController');
Route::resource('admin/ad', 'Admin\AdController');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

