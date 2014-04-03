<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Auth::loginUsingId(1);

Route::get('/', function()
{
    $posts = Post::all();

	return View::make('index', [ 'posts' => $posts ]);
})->before('auth');


Route::get('/post/{id}', [ 'as' => 'post', 'uses' => 'PostsController@show' ])->before('auth');
Route::resource('login', 'LoginController', [ 'only' => [ 'index', 'store', 'destroy' ] ]);
Route::resource('signup', 'SignupController', [ 'only' => [ 'index', 'store' ] ]);
Route::resource('upgrade', 'UpgradeController', [ 'only' => [ 'index', 'store' ] ]);

?>