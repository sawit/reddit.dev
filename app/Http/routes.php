<?php
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
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

Route::get('/', 'HomeController@showWelcome');

Route::resource('posts', 'PostsController');
Route::post('/posts/add-vote', 'PostsController@addVote');
Route::get('/profile/{id}', 'UsersController@show');
Route::get('/post/{id}/show', 'PostsController@show');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

 Route::get('/', 'HomeController@showWelcome');
 Route::resource('posts', 'PostsController');
 Route::get('/posts/search', 'PostsController@search');
 Route::get('/posts/{id}/edit', 'PostsController@edit');
// Route::get('/posts/{id}/update', 'PostsController@update');
 Route::get('/profile/{id}', 'UsersController@update');
//


// Route::get('auth/account', 'PostsController@profile');
