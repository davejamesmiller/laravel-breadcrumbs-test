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

Route::bind('category', function($id)
{
	return new App\Category($id);
});

Route::bind('post', function($id)
{
	return new App\Post($id);
});

Route::get('/', ['as' => 'home', function()
{
	return View::make('home');
}]);

Route::get('/blog', ['as' => 'blog', function()
{
	return View::make('blog');
}]);

Route::get('/category/{category}', ['as' => 'category', function($category)
{
	return View::make('category', compact('category'));
}]);

// TODO: Why do I have to add 'uses' here but not everywhere?
Route::get('/post/{post}', ['as' => 'post', 'uses' => function($post)
{
	return View::make('post', compact('post'));
}]);

Route::get('/bootstrap2', ['as' => 'bootstrap2', function()
{
	return View::make('bootstrap2');
}]);

// TODO: Why do I have to add 'uses' here but not everywhere?
Route::get('/print_r', ['as' => 'print_r', 'uses' => function()
{
	return View::make('print_r');
}]);
